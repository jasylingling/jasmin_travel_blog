<?php
session_start();

require_once('../includes/config.inc.php');
require_once('../includes/functions.inc.php');

if(!sessionIsValid()) {
    session_unset(); // clean up session data
	session_regenerate_id();
	// redirect to login page, no access!
    header("Location: ../pages/login");
    die();
}

// refresh session
session_regenerate_id(); // replace current session id with a newly generated one - make hijacking difficult
$_SESSION['timestamp'] = time(); // every user activity (script call) refreshes session limit time

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';


/* === REGISTRATION FORM === */

$statement = "";
$validationErrorUsername = "";
$validationErrorMail = "";
$validationErrorPW = "";
$validationErrorPWMatch = "";

// check if submit-button is clicked
if(isset($_POST['submit'])) {
    // if yes, desinfect user inputs
	$registration_user = desinfect($_POST['register_username']); 
    $email = desinfect($_POST['email']);
    $registration_password = desinfect($_POST['register_password']);
    $confirm_password = desinfect($_POST['confirm_password']);

    $registrationUserValue = $registration_user;
    $emailValue = $email;
    $registrationPasswordValue = $registration_password;
    $confirmPasswordValue = $confirm_password;

    // check if username field is empty
    if(empty($registration_user)){
        $validationErrorUsername = "<ul role=\"alert\"><li>Bitte gib den gewünschten Usernamen ein.</li></ul>";
    } else {
        // check if username is already taken
        $queryLogin = "SELECT * FROM `users` WHERE `username`=?";
        
        $stmt = mysqli_prepare($conn, $queryLogin);
        mysqli_stmt_bind_param($stmt, 's', $registration_user); // 's' = 1 string: username
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $numRows = mysqli_num_rows($result); // count number of matches
        // print_r($numRows);

        if($numRows == 1) {
            $userdata = mysqli_fetch_assoc($result);
            $validationErrorUsername = "<ul role=\"alert\"><li>Sorry, dieser Username ist bereits vergeben!</li></ul>";
        }                 
    }
    
    // check if password field is empty
    if(empty($registration_password)){
        $validationErrorPW = "<ul role=\"alert\"><li>Bitte gib das gewünschte Passwort ein.</li></ul>";
    } // else if (!$registration_password == $confirm_password) {
    //     $validationErrorPWMatch = "Whoops, Passwort stimmt nicht überein.";
    // }


    if(!$validationErrorUsername && !$validationErrorMail && !$validationErrorPW && !$validationErrorPWMatch) {
        $password_hash = password_hash($registration_password, PASSWORD_DEFAULT); // create a password hash    
	
        $query = "INSERT INTO `users` (`username`, `email`, `password`) VALUES (?, ?, ?)";
        
        $statement = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($statement, 'sss', $registration_user, $email, $password_hash); // 'sss' = 3 strings: username, email & password_hash
        mysqli_stmt_execute($statement);
        // if($statement) {
        //     echo "Registration successful!";
        // }
    }  
} else {
    $registrationUserValue = "";
    $emailValue = "";
    $registrationPasswordValue = "";
    $confirmPasswordValue = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include("../includes/head.inc.html")?>
    <title>CMS&nbsp;&ndash; Register User | Jasmin's Travel Blog</title>

</head>

<body>

    <!-- Navigation -->
    <?php include("../includes/nav_cms.inc.html")?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('../img/clouds.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Register User</h1>
                        <span class="subheading">Registriere hier neue Benutzer für dieses CMS.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-10 mx-auto">
            <h2 class="text-center">Registration</h2>
                <form action="register" method="post">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="username">Username</label>
                            <input type="text" class="form-control bg-light border" name="register_username"
                                id="register_username" value="<?=$registrationUserValue?>" placeholder="Username">
                            <div class="help-block text-danger"><?=$validationErrorUsername?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="email">E-Mail-Adresse</label>
                            <input type="email" class="form-control bg-light border" name="email" id="email" value="<?=$emailValue?>"
                                placeholder="E-Mail-Adresse">
                            <div class="help-block text-danger"><?=$validationErrorMail?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="password">Passwort</label>
                            <input type="password" class="form-control bg-light border" name="register_password"
                                id="register_password" value="<?=$registrationPasswordValue?>" placeholder="Passwort">
                            <div class="help-block text-danger"><?=$validationErrorPW?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="confirm_password">Passwort bestätigen</label>
                            <input type="password" class="form-control bg-light border" name="confirm_password"
                                id="confirm_password" value="<?=$confirmPasswordValue?>" placeholder="Passwort bestätigen">
                            <div class="help-block text-danger"><?=$validationErrorPWMatch?></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Registrieren</button>
                </form>
                <?php 
                if($statement) { 
                    echo "<p class=\"alert alert-success\"><strong><u>Registrierung erfolgreich, yay!</u><br>In Kürze wird der neue Benutzer ein Mail mit den Zugangsdaten erhalten.</strong></p>";
                } 
                ?>
            </div>
        </div>
    </div>
    <br>
    <hr>

    <!-- Footer -->
    <?php include("../includes/footer.inc.php")?>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/clean-blog.min.js"></script>

</body>

</html>