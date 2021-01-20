<?php
session_start();
require_once('../includes/config.inc.php');
require_once('../includes/functions.inc.php');
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
            <h1>Who's that girl?</h1>
            <span class="subheading">Dieses und jenes über mich</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Hellöle. <i class="far fa-smile"></i> Mein Name ist Jasmin, ich bin ein 91er Kind und habe taiwanesische und
          schweizerische Wurzeln. Zurzeit bin ich sesshaft in Zürich und absolviere eine Weiterbildung in Webdesign & Development.</p>
        <p>Bereits als ich etwa 6 Jahre alt war, habe ich zusammen mit meinen Eltern alle Kontinente bereist,
          weshalb wohl daher meine Reiselust kommt. Leider mag ich mich an viele Länder in dieser Zeitspanne nicht
          mehr genau erinnern, versuche jedoch diese Erinnerungen wieder aufleben zu lassen und/oder neue zu
          schaffen.</p>
        <p>Mein «Ziel» ist es nicht, möglichst viele Länder (wieder) zu entdecken, sondern jedes einzelne besuchte
          Land viel bewusster zu geniessen und die schönen Momente in Fotos festzuhalten.</p>

        <img class="img-fluid" src="../img/me_at_godafoss.jpg"
          alt="me sitting on a rock at the waterfall godafoss, iceland">
        <span class=" caption text-muted">Wasserfall Godafoss, Island</span>

        <p>Was die meisten sehr erstaunt, ist, dass ich Winter und vor allem Schnee bevorzuge. Ich liebe diese
          gemütliche «kuschlige» Atmosphäre, wenn man sich dick mit Schal und einer Bommelmütze einpackt und in
          gemütlichen Cafés seine Zeit vertreibt oder einen Glühwein in den sonnigen Bergen geniesst.</p>
        <p>Somit sollte es keinen verwundern, dass ich die Schweizer Berge oder kalte Länder wie zum Beispiel Island
          liebe! Zu Strandferien in Spanien oder Mexiko sage ich aber auch nicht nein. <i class="far fa-smile-wink"></i>
        </p>
        <p>Gerne lasse ich euch in diesem Blog an meinen Eindrücken teilhaben und hoffe, in euch auch ein bisschen
          die Reiselust zu wecken. <i class="far fa-laugh-beam"></i></p>

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