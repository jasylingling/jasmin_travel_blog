<?php
session_start();
$username = $_SESSION['username'];

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
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include("../includes/head.inc.html")?>    
    <title>CMS&nbsp;&ndash; Dashboard | Jasmin's Travel Blog</title>

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
                        <h1>Welcome <?=$username?>!</h1>
                        <span class="subheading">Hier kannst du Beiträge der Website editieren, löschen oder einen neuen
                            Artikel erstellen.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">

        <div class="row">
            <!-- <p class="col-lg-12">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae blanditiis officia eligendi impedit dolorem distinctio rem dolorum nesciunt laboriosam id!</p> -->
            
            <div class="col-lg-4 offset-lg-2">
                <a href="site-manager#blog">
                    <div class="card border-info mb-5" style="max-width: 18rem;">
                        <div class="card-header">Blog</div>
                        <div class="card-body text-info">
                            <h5 class="card-title">Info card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4">
                <a href="site-manager#about">
                    <div class="card border-info mb-5" style="max-width: 18rem;">
                        <div class="card-header">About</div>
                        <div class="card-body text-info">
                            <h5 class="card-title">Info card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </a>
            </div>
            
        </div>
        <div class="row">
            <!-- <p class="col-lg-12">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae blanditiis officia eligendi impedit dolorem distinctio rem dolorum nesciunt laboriosam id!</p> -->
            
            <div class="col-lg-4 offset-lg-2">
                <a href="register">
                    <div class="card border-info mb-3" style="max-width: 18rem;">
                        <div class="card-header">Enter new user</div>
                        <div class="card-body text-info">
                            <h5 class="card-title">Info card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4">
                <a href="register#users_anchor">
                    <div class="card border-info mb-3" style="max-width: 18rem;">
                        <div class="card-header">Manage user</div>
                        <div class="card-body text-info">
                            <h5 class="card-title">Info card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </a>
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