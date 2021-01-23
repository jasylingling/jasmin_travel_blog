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

// ***************** AB HIER BEISPIEL RENÉ - ANPASSEEEN !! // BEITRÄGE LESEN UND LÖSCHEN (** READ UND DELETE VON C *R* U *D* ***) ******************* 

// Löschen eines Datensatzes
if(isset($_POST['go'])){
    $cleanId = filter_var($_POST['go'], FILTER_SANITIZE_STRING);
    $sqldelete = "DELETE FROM contents WHERE id=".$cleanId;
    $resultdelete = mysqli_query($con,$sqldelete);
}


// Alle Beiträge aufrufen
$sql = "SELECT id,title FROM contents";
// $result = $con->query($sql);
$result = mysqli_query($con,$sql);
// if($result->num_rows > 0){ => objektorientiert
if(mysqli_num_rows($result) > 0){
    $code = "<form action=\"index.php\" method=\"post\">";
    $code .= "<ul>";
    // while($row = $result->fetch_assoc()) { => objektorientiert
    while($row = mysqli_fetch_assoc($result)) {
        $code .= "<li>";
        // Link zum Updaten eines Beitrages
        $code .= "<a href=\"update.php?id=".$row["id"]."\" >".$row["title"]."</a>";
        // Button zum Löschen
        $code .= " <button type=\"submit\" name=\"go\">Löschen</button>";
        $code .= "</li>";
    }
    $code .= "</ul>";
    $code .= "</form>";
}

else {
    $code .= "No results";
}
// ***************** ENDE BEISPIEL RENÉ - ANPASSEEEN !! // BEITRÄGE LESEN UND LÖSCHEN (** READ UND DELETE VON C *R* U *D* ***) ******************* 


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include("../includes/head.inc.html")?>
    <title>CMS&nbsp;&ndash; Site Manager | Jasmin's Travel Blog</title>

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
                        <h1>Site Manager</h1>
                        <span class="subheading">Editieren, löschen oder etwas Neues kreieren? Just do it!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <!-- ********** READ UND DELETE VON C *R* U *D* // ANPASSEEEEEEEEEEN ************ -->
                <h2>Übersicht Beiträge Home</h2>
                <?php
                echo "Hier stehen Auflistung Inhalte und Button \"Beabeiten\" und \"Löschen\"";
                ?>

                <h2>Übersicht Beiträge Blogartikel</h2>
                <?php
                echo "Hier stehen Auflistung Inhalte und Button \"Beabeiten\" und \"Löschen\"";
                ?>

                <h2>Übersicht Galerie Blog</h2>
                <?php
                echo "Hier stehen Auflistung Inhalte und Button \"Beabeiten\" und \"Löschen\"";
                ?>
            </div>
        </div>
    </div>

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