<?php
require_once('../includes/config.inc.php');
require_once('../includes/functions.inc.php');

// ***************** AB HIER BEISPIEL RENÉ - ANPASSEEEN !! // BEITRÄGE SCHREIBEN (***CREATE VON *C*RUD ***) ******************* 

// Insert record
if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $short_desc = $_POST['short_desc'];
    $long_desc = $_POST['long_desc'];
  
    if($title != ''){
  
      mysqli_query($con, "INSERT INTO contents(title,short_desc,long_desc) VALUES('".$title."','".$short_desc."','".$long_desc."') ");
      // header('location: index.php');
    }
  }
  
  ?>
  <!DOCTYPE html>
  <html lang="en">
      <head>
          <meta charset="utf-8">
          <title>Schreiben php</title>
          <!-- Make sure the path to CKEditor is correct. -->
          <script src="ckeditor-4/ckeditor.js"></script>
      </head>
      <style type="text/css">
      .cke_textarea_inline{
         border: 1px solid black;
      }
      </style>
      <body>
      <br><br>
  <form method='post' action='schreiben.php'>
         Title : 
         <input type="text" name="title" >
          <br><br>
         Short Description: 
         <textarea id='short_desc' name='short_desc' style='border: 1px solid black;'></textarea><br>
  
         Long Description: 
         <textarea id='long_desc' name='long_desc' ></textarea><br>
  
         <input type="submit" name="submit" value="Speichern"> 
         <input type="submit" name="submit" value="Abbrechen">

      </form>
  
  <script type="text/javascript">
  // Initialize CKEditor
  CKEDITOR.inline( 'short_desc' );
  
  CKEDITOR.replace('long_desc',{
      customConfig: 'MyConfig.js',
        width: "500px",
        height: "200px"
  
  }); 
  
  </script>
      </body>
  </html>

  <!-- ***************** ENDE BEISPIEL RENÉ - ANPASSEEEN !! // BEITRÄGE SCHREIBEN (***CREATE VON *C*RUD ***) *******************  -->


  <!-- ************ OFFIZIELLE SITE MANAGER VERSION, TO DO: ANPASSEN AUF EDIT-PART ********* -->


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
                        <span class="subheading">Erstelle einen neuen Blogartikel.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h2>Übersicht Blogartikel</h2>
                <?php
                echo "Hier stehen Auflistung Inhalte und Button \"Beabeiten\" und \"Löschen\"";
                echo "$code";
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

<!-- ************ OFFIZIELLE SITE MANAGER VERSION, TO DO: ANPASSEN AUF EDIT-PART ********* -->