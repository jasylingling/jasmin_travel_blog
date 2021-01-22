<?php
session_start();
session_regenerate_id(); // replace current session id with a newly generated one - make hijacking difficult 

require_once('../includes/config.inc.php');
require_once('../includes/functions.inc.php');


/* === LOGIN FORM === */

$loginError = false;
$validationErrorUsername = "";
$validationErrorPW = "";

// check if submit-button is clicked
if(isset($_POST['submit'])) {
    // if yes, desinfect user inputs
    $username = desinfect($_POST['username']); 
    $password = desinfect($_POST['password']);

    $usernameValue = $username;
    $passwordValue = $password;

    // check if username field is empty
    if(empty($username)) {
        $validationErrorUsername = "<ul role=\"alert\"><li>Bitte gib deinen Usernamen ein.</li></ul>";
    }
    
    // check if password field is empty
    if(empty($password)) {
        $validationErrorPW = "<ul role=\"alert\"><li>Bitte gib dein Passwort ein.</li></ul>";
    }

    if(!$validationErrorUsername && !$validationErrorPW) {
        // search username in the database
        $queryLogin = "SELECT * FROM `users` WHERE `username`=?";
        
        $stmt = mysqli_prepare($conn, $queryLogin);
        mysqli_stmt_bind_param($stmt, 's', $username); // 's' = 1 string: username
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $numRows = mysqli_num_rows($result); // count number of matches
        // print_r($numRows);

        if($numRows == 1) {
            $userdata = mysqli_fetch_assoc($result);
            // echo '<pre> User Data: ';
            // print_r($userdata);
            // print_r($password);
            // echo '</pre>';
            if(password_verify($password, $userdata['password'])) {
                // echo "Passwort verifiziert";    
                        
                $_SESSION['isLoggedin'] = true; // login state
                $_SESSION['timestamp'] = time(); // for session limit time
                $_SESSION['userip'] = $_SERVER['REMOTE_ADDR']; // user ip
                $_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT']; // user agent of the visitor's browser
                $_SESSION['username'] = $username;
                // echo '<pre>';
                // print_r($_SESSION); 
                // echo '</pre>';
                
                // redirect to CMS Dashboard
                header('Location: ../cms/dashboard'); 
            } else {
                $loginError = true; // wrong password
            }
        } else {
            $loginError = true; // wrong username
        }     
    }        
} else {
	$usernameValue = "";
    $passwordValue = "";
}

$sessionValid = sessionIsValid();

if(!$sessionValid) {
    session_unset(); // clean up session data
	session_regenerate_id(); // replace current session id with a newly generated one
} else if ($sessionValid) {
    $_SESSION['timestamp'] = time(); // refresh session time
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include("../includes/head.inc.html")?>
    <title>Login | Jasmin's Travel Blog</title>

</head>

<body>

    <!-- Navigation -->
    <?php include("../includes/nav_pages.inc.php")?>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('../img/clouds.jpg')">
        <div class=" overlay">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1><i class="fas fa-sign-in-alt"></i> Login</h1>
                        <span class="subheading">Logge dich in deinen Account ein.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-10 mx-auto">
                <!-- LOGIN Form -->
                <h2 class="text-center">Login</h2>
                <form action="login" method="post">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="username">Username</label>
                            <input type="text" class="form-control bg-light border" name="username" id="username"
                                placeholder="Username" value="<?=$usernameValue?>">
                            <div class="help-block text-danger"><?=$validationErrorUsername?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="password">Passwort</label>
                            <input type="password" class="form-control bg-light border" name="password" id="password"
                                placeholder="Passwort" value="<?=$passwordValue?>">
                            <div class="help-block text-danger"><?=$validationErrorPW?></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Anmelden</button>
                </form>
                <?php 
                if($loginError) {
                    echo "<p class=\"alert alert-danger\"><strong>Username oder Passwort falsch</strong></p>";
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

    <!-- Custom scripts for this template -->
    <script src="../js/clean-blog.min.js"></script>

</body>

</html>