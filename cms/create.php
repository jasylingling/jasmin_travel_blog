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


$validationErrorCountry = "";
$validationErrorTitle = "";
$validationErrorSubtitle = "";
$validationErrorContent = "";
setlocale(LC_ALL, "de"); // set locale to "de" for "german" time zone

// check if save-button is clicked
if(isset($_POST['save'])) {
    $country = desinfect($_POST['country']); 
    $title = desinfect($_POST['title']);
    $subtitle = desinfect($_POST['subtitle']);
    $content = desinfect($_POST['content']);

    $countryValue = $country;
    $titleValue = $title;
    $subtitleValue = $subtitle;
    $contentValue = $content;
    $author = $_SESSION['username'];
    $currentDate = date("Y-m-d");

    // check if country field is empty
    if(empty($country)) {
        $validationErrorCountry = "<ul role=\"alert\"><li>Bitte gib ein Land ein.</li></ul>";
    } else if (strlen($country) > 250) {
        $validationErrorCountry = "<ul role=\"alert\"><li>Dieses Feld darf nicht mehr als 250 Zeichen enthalten.</li></ul>";
    }
    
    // check if title field is empty
    if(empty($title)) {
        $validationErrorTitle = "<ul role=\"alert\"><li>Bitte gib einen Titel ein.</li></ul>";
    } else if (strlen($title) > 250) {
        $validationErrorTitle = "<ul role=\"alert\"><li>Dieses Feld darf nicht mehr als 250 Zeichen enthalten.</li></ul>";
    }

    // check if subtitle field is empty
    if(empty($subtitle)) {
        $validationErrorSubtitle = "<ul role=\"alert\"><li>Bitte gib einen Untertitel ein.</li></ul>";
    } else if (strlen($subtitle) > 250) {
        $validationErrorSubtitle = "<ul role=\"alert\"><li>Dieses Feld darf nicht mehr als 250 Zeichen enthalten.</li></ul>";
    }

    // check if content field is empty
    if(empty($content)) {
        $validationErrorContent = "<ul role=\"alert\"><li>Bitte gib einen Text ein.</li></ul>";
    }

    // if no validation errors, insert new article to database
    if(!$validationErrorCountry && !$validationErrorTitle && !$validationErrorSubtitle && !$validationErrorContent) {

        $query = "INSERT INTO `contents` (`country`, `title`, `subtitle`, `content_blogarticle`, `author`, `post_date`) VALUES (?, ?, ?, ?, ?, ?)";
        
        $statement = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($statement, 'ssssss', $country, $title, $subtitle, $content, $author, $currentDate); // 'ssssss' =  6 strings: country, title, subtitle, content, author (username), current date
        if(!mysqli_stmt_execute($statement)) {
            echo mysqli_stmt_error($statement);
        } else {
            header("Location: site-manager?created");
            die();
        }
    }
    
} else {
    $countryValue = "";
    $titleValue = "";
    $subtitleValue = "";
    $contentValue = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include("../includes/head.inc.html")?>
    <title>CMS&nbsp;&ndash; Site Manager&nbsp;&ndash; Neuer Artikel | Jasmin's Travel Blog</title>
    <!-- <script src="../ckeditor/ckeditor.js"></script> -->

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
                <h2 class="text-center">Neuer Artikel</h2>
                <form action="create" method="post">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="country">Land</label>
                            <input type="text" class="form-control bg-light border" name="country" id="country"
                                placeholder="Land" value="<?=$countryValue?>">
                            <div class="help-block text-danger"><?=$validationErrorCountry?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="title">Titel</label>
                            <input type="text" class="form-control bg-light border" name="title" id="title"
                                placeholder="Titel" value="<?=$titleValue?>">
                            <div class="help-block text-danger"><?=$validationErrorTitle?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="subtitle">Untertitel</label>
                            <input type="subtitle" class="form-control bg-light border" name="subtitle" id="subtitle"
                                placeholder="Untertitel" value="<?=$subtitleValue?>">
                            <div class="help-block text-danger"><?=$validationErrorSubtitle?></div>
                        </div>
                    </div>                 
                    <!-- <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="message">Textinhalt</label>
                            <textarea name="content" id="content" rows="10" cols="80">
                            Bitte Textinhalt eingeben... CK EDITOR FORMAAAAAAAAAAT
                            </textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>                 -->
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="content">Textinhalt</label>
                            <textarea class="form-control bg-light border" name="content" id="content" rows="10" cols="80" placeholder="Textinhalt"><?=$contentValue?></textarea>
                            <div class="help-block text-danger"><?=$validationErrorContent?></div>
                        </div>
                    </div>
                    <button type="save" class="btn btn-primary mr-1" name="save">Speichern</button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-light border-dark" data-toggle="modal" data-target=".cancel-lg">Abbrechen</button>
                    <!-- Modal -->
                    <div class="modal fade cancel-lg" id="cancel" tabindex="-1" role="dialog" aria-labelledby="cancel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="cancel">Vorgang abbrechen</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Möchtest du wirklich abbrechen? Der neue Artikel wird nicht gespeichert!
                                </div>
                                <div class="modal-footer">
                                    <a href="site-manager" class="btn btn-danger">Ja, zurück zur Übersicht</a>
                                    <button type="button" class="btn btn-light border-dark" data-dismiss="modal">Nein, nicht abbrechen</button>
                                </div>
                            </div>
                        </div>
                    </div>             
                </form>
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

    <!-- Script for CKEditor -->
    <!-- <script>
        CKEDITOR.replace( 'content', {
            extraPlugins: 'editorplaceholder',
            editorplaceholder: 'Textinhalt'
        } );
    </script> -->

</body>

</html>