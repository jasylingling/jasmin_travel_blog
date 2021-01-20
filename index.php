<?php
session_start();
require_once('includes/config.inc.php');
require_once('includes/functions.inc.php');
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
              echo "<li class=\"nav-item\"><a class=\"nav-link border border-white rounded\" href=\"includes/logout\"><i class=\"fas fa-sign-out-alt\" style=\"font-size: medium;\"></i> Logout</a></li>";            
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
        <div class="post-preview">
          <a href="pages/blog#japan">
            <h2 class="post-title">
              JAPAN&nbsp;&ndash; Das Land der aufgehenden Sonne.
            </h2>
            <h3 class="post-subtitle">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi consequatur libero at ipsam fuga
              repellendus.
            </h3>
          </a>
          <p class="post-meta">Gepostet von
            <a href="pages/about">Jasmin</a>
            am 8. November 2020
          </p>
          <a href="pages/blog#japan">
            <img class="img-fluid" src="img/japan_coverpic.jpg"
              alt="a golden Buddhist temple in Kyoto, Japan called Kinkaku-ji (Golden Pavilion)">
          </a>
        </div>
        <hr>
        <div class="post-preview">
          <a href="pages/blog#iceland">
            <h2 class="post-title">
              ISLAND&nbsp;&ndash; Kaltes Land, warmes Herz.
            </h2>
            <h3 class="post-subtitle">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus aliquam ex impedit error nam sunt
              placeat. Autem qui consectetur veritatis.
            </h3>
          </a>
          <p class="post-meta">Gepostet von
            <a href="pages/about">Jasmin</a>
            am 12. Oktober 2020
          </p>
          <a href="pages/blog#iceland">
            <img class="img-fluid" src="img/iceland_coverpic.jpg"
              alt="snowy landscape with hot spring in Grindavik, Iceland">
          </a>
        </div>
        <hr>
        <div class="post-preview">
          <a href="pages/blog#mexico">
            <h2 class="post-title">
              MEXIKO&nbsp;&ndash; Fiestas, Farben und vieles mehr.
            </h2>
            <h3 class="post-subtitle">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi explicabo, at ratione voluptatibus illum
              saepe facere fugiat illo.
            </h3>
          </a>
          <p class="post-meta">Gepostet von
            <a href="pages/about">Jasmin</a>
            am 1. September 2020
          </p>
          <a href="pages/blog#mexico">
            <img class="img-fluid" src="img/mexico_coverpic.jpg"
              alt="me jumping in front of the mayan temple Chichen Itza in Yucatan, Mexico">
          </a>
        </div>
        <hr>
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