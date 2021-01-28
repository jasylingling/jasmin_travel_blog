<?php
session_start();
require_once('includes/config.inc.php');
require_once('includes/functions.inc.php');

// get all blog content from database
$query = "SELECT * FROM `content_blog`";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) { 
      $blogPosts [] = [
          'country' => $row['country'],
          'title' => $row['title'],
          'subtitle' => $row['subtitle'],
          'date' => $row['post_date'],
          'author' => $row['author']
      ];
    }
    // echo '<pre>';
    // print_r($blogPosts);
    // echo '</pre>';
    
} else {
    die("No results.");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Seo optimized meta description/keywords -->
  <meta name="description"
    content="Jasmin's Travel Blog – Freude am Reisen teilen und andere damit anstecken/inspirieren!">
  <meta name="keywords" content="reisen, travel, blog, wanderlust, inspire">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
    type='text/css'>
  <link
    href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
    rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="css/clean-blog.css">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
  <link rel="shortcut icon" type="image/png" href="https://i.imgur.com/O1HRFGB.png">
  <link rel="manifest" href="favicon/site.webmanifest">
  <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  
  <title>Jasmin's Travel Blog</title>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="./">Jasmin's Travel Blog <i class="fas fa-globe-africa"></i></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="./">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/contact">Contact</a>
          </li>
          <li class="nav-item" id="loginIcon">
            <a class="nav-link" href="pages/login" title="login" aria-label="login or register to the cms"><i
                class="far fa-user" style="font-size: large;"></i></a>
          </li>
          <?php
          if(sessionIsValid()) {
              echo "<li class=\"nav-item\"><a class=\"nav-link rounded btn btn-primary mr-2 ml-2\" href=\"cms/dashboard\"><i class=\"fas fa-cog\" style=\"font-size: medium;\"></i> Dashboard</a></li>";
              echo "<style>#loginIcon{display: none !important;}</style>";
              echo "<li class=\"nav-item\"><a class=\"nav-link border border-white rounded\" href=\"includes/logout\" id=\"logoutIcon\"><i class=\"fas fa-sign-out-alt\" style=\"font-size: medium;\"></i> Logout</a></li>";            
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/sakura.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Hey there :)</h1>
            <span class="subheading">Schön, hast du hierher gefunden&nbsp;&ndash; viel Spass beim Durchstöbern!</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <?php foreach (array_reverse($blogPosts) as $key => $value) { 
          $desiredTitle =  $value['title'];
          // get images from the database
          $query2 = "SELECT * FROM `images_blog` WHERE `blogarticle`=?";
          $stmt = mysqli_prepare($conn, $query2);
          mysqli_stmt_bind_param($stmt, 's', $desiredTitle);
          mysqli_stmt_execute($stmt);
          $result2 = mysqli_stmt_get_result($stmt);
          // $result2 = mysqli_query($conn, $query2);
          if(mysqli_num_rows($result2) > 0) {
            while($row = mysqli_fetch_assoc($result2)) { 
              $blogImages [] = [
                  'filename' => $row['img_filename'],
                  'description' => $row['img_description'],
                  'caption' => $row['img_caption'],
                  'article' => $row['blogarticle'],
                  'coverpic' => $row['coverpic']
              ];
            }
            // echo '<pre>';s
            // print_r($blogPosts);
            // echo '</pre>';
            $noImages = false;
          } else { $noImages = true; } ?>
        <div class="post-preview">
          <a href="pages/blog#<?=$value['country']?>">
            <h2 class="post-title">
              <?=$value['title']?>
            </h2>
            <h3 class="post-subtitle">
              <?=$value['subtitle']?>
            </h3>
          </a>
          <p class="post-meta">gepostet von <?=$value['author']?> am <?=date("d.m.Y", strtotime($value['date']))?></p>
          <?php 
          if(!$noImages){
          foreach ($blogImages as $key2 => $value2) {
            if ($value['title'] == $value2['article'] && $value2['coverpic'] == "yes" ) {
          ?>
          <a href="pages/blog#<?=$value['country']?>">
            <img class="img-fluid" src="img/<?=$value2['filename']?>"
              alt="<?=$value2['caption']?>">
          </a>
          <?php } } } else { echo "<img src=\"favicon/android-chrome-192x192.png\">"; } ?> 
        </div>     
        <hr>
        <?php } ?> 
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="pages/blog#olderposts">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>
  <hr>

  <!-- Footer -->
  <?php include("includes/footer.inc.php")?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>