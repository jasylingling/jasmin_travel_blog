<?php
session_start();
require_once('../includes/config.inc.php');
require_once('../includes/functions.inc.php');

// get all blog content from database
$query = "SELECT * FROM `content_blog`";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) { 
      $blogPosts [] = [
          'country' => $row['country'],
          'title' => decodeStr($row['title']),
          'subtitle' => decodeStr($row['subtitle']),
          'content' => decodeStr($row['content_blogarticle']),
          'date' => $row['post_date'],
          'author' => $row['author'],
          'id' => $row['id']
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

  <?php include("../includes/head.inc.html")?>
  <title>Blog | Jasmin's Travel Blog</title>

</head>

<body>

  <!-- Navigation -->
  <?php include("../includes/nav_pages.inc.php")?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../img/logo_without_title_favicon.svg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Love at first sight</h1>
            <span class="subheading">Länder, welche mich gleich gepackt haben und ich immer wieder besuchen
              könnte!</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <?php foreach (array_reverse($blogPosts) as $key => $value) { ?>
          <!-- Country Article -->
          <h2 id="<?=$value['country']?>"><?=$value['title']?></h2>
          <span class="meta"><em>gepostet von <?=$value['author']?> am <?=date("d.m.Y", strtotime($value['date']))?></em></span>
          <p><?=$value['content']?></p>

           
          <?php
          $desiredTitle =  $value['title'];
          // Get images from the database
          
          $query2 = "SELECT * FROM `images_blog` WHERE `blogarticle`=?";
          $stmt = mysqli_prepare($conn, $query2);
          mysqli_stmt_bind_param($stmt, 's', $desiredTitle);
          mysqli_stmt_execute($stmt);
          $result2 = mysqli_stmt_get_result($stmt);
          // $result2 = mysqli_query($conn, $query2);
          if(mysqli_num_rows($result2) > 0){
            while($row = mysqli_fetch_assoc($result2)) { 
              $blogImages [] = [
                  'filename' => $row['img_filename'],
                  'description' => $row['img_description'],
                  'caption' => $row['img_caption'],
                  'article' => $row['blogarticle']
              ];
            }
            // echo '<pre>';s
            // print_r($blogPosts);
            // echo '</pre>';
            $noImages = false;
          } else { $noImages = true;} ?>

          <!-- Gallery Country -->
          <section id="gallery-<?=$value['country']?>" class="d-flex justify-content-center flex-wrap">
            <?php 
            if(!$noImages){
            foreach ($blogImages as $key2 => $value2) {
              if ($value['title'] == $value2['article']) {
            ?>
            <a href="../img/<?=$value2['filename']?>" data-lightbox="<?=$value['country']?>"
              data-title="<?=$value2['caption']?>"><img src="../img/<?=$value2['filename']?>"
                alt="<?=$value2['description']?>" height="200"
                class="border border-white"></a>
            <?php } } } else { echo "<img src=\"../favicon/android-chrome-192x192.png\">";} ?> 
          </section>
          <br>
          <hr>
          <br>          
          <?php } ?> 
          <div id="olderposts"></div>
        </div>
      </div>
    </div>
  </article>
  <br>
  <hr>

  <!-- Footer -->
  <?php include("../includes/footer.inc.php")?>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/clean-blog.min.js"></script>

  <!-- Link to Lightbox JavaScript and call the option method for Lightbox -->
  <script src="../js/lightbox.js"></script>

  <script>
    lightbox.option({
      'albumLabel': "Bild %1 of %2",
      'alwaysShowNavOnTouchDevices': true,
      'wrapAround': true
    })
  </script>

</body>

</html>