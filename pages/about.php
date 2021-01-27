<?php
session_start();
require_once('../includes/config.inc.php');
require_once('../includes/functions.inc.php');

// get ABOUT content from database
$query = "SELECT * FROM `content_about`";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) { 
        $aboutContent [] = [
            'title_about' => decodeStr($row['title']),
            'subtitle_about' => decodeStr($row['subtitle']),
            'content_top' => decodeStr($row['content_top']),
            'content_bottom' => decodeStr($row['content_bottom'])
        ];
    }
} else {
    die("About-Seite kann nicht gefunden werden.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include("../includes/head.inc.html")?>
  <title>About | Jasmin's Travel Blog</title>

</head>

<body>

  <!-- Navigation -->  
  <?php include("../includes/nav_pages.inc.php")?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../img/me_in_mexico.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1><?=$aboutContent[0]['title_about']?></h1>
            <span class="subheading"><?=$aboutContent[0]['subtitle_about']?></span>
          </div>
        </div>
      </div>
    </div>
  </header>

 <!-- Main Content -->
 <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p><?=$aboutContent[0]['content_top']?></p>

        <img class="img-fluid" src="../img/me_at_godafoss.jpg"
          alt="me sitting on a rock at the waterfall godafoss, iceland">
        <span class=" caption text-muted">Wasserfall Godafoss, Island</span>

        <p><?=$aboutContent[0]['content_bottom']?></p>

        <img class="img-fluid" src="../img/me_in_copenhagen.jpg"
          alt="me standing in front of tiny red guard house at christiansborg (copenhagen), denmark">
        <span class=" caption text-muted">Christiansborg (Kopenhagen), Dänemark</span>
      </div>
    </div>
  </div>

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