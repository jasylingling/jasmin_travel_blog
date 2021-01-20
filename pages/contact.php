<?php
session_start();
require_once('../includes/config.inc.php');
require_once('../includes/functions.inc.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include("../includes/head.inc.html")?>
  <title>Contact | Jasmin's Travel Blog</title>

</head>

<body>
  
  <!-- Navigation -->  
  <?php include("../includes/nav_pages.inc.php")?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../img/contact_me.svg'); background-size: contain;">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Let's get in touch!</h1>
            <span class="subheading">Sag hallo oder frag mich was :)</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Trete über das untenstehende Formular mit mir in Kontakt&nbsp;&ndash; ich werde mich schnellstmöglich bei dir
          melden! :)
        </p>
        <form name="sentMessage" id="contactForm" novalidate>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="name">Name</label>
              <input type="text" class="form-control bg-light border" placeholder="Name" id="name" required
                data-validation-required-message="Bitte gib deinen Namen ein.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="email">E-Mail-Adresse</label>
              <input type="email" class="form-control bg-light border" placeholder="E-Mail-Adresse" id="email" required
                data-validation-required-message="Bitte gib deine E-Mail-Adresse ein.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="message">Message</label>
              <textarea rows="5" class="form-control bg-light border" placeholder="Message" id="message" required
                data-validation-required-message="Bitte gib eine Nachricht ein - ich kann leider nicht hellsehen was du mir zu sagen hast. ;)"></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Absenden</button>
        </form>
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