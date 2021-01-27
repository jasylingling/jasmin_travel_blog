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


$validationErrorTitle = "";
$validationErrorSubtitle = "";
$validationErrorContentTop = "";
$validationErrorContentBottom = "";

// check if save-button is clicked
if(isset($_POST['save'])) {
    $title = desinfect($_POST['title']); 
    $subtitle = desinfect($_POST['subtitle']);
    $content_top = desinfect($_POST['content_top']);
    $content_bottom = desinfect($_POST['content_bottom']);

    $titleValue = $title;
    $subtitleValue = $subtitle;
    $contentTopValue = $content_top;
    $contentBottomValue = $content_bottom;
        
    // check if title field is empty
    if(empty($title)) {
        $validationErrorTitle = "<ul role=\"alert\"><li>Dieses Feld darf nicht leer sein.</li></ul>";
    } else if (strlen($title) > 250) {
        $validationErrorTitle = "<ul role=\"alert\"><li>Dieses Feld darf nicht mehr als 250 Zeichen enthalten.</li></ul>";
    }

    // check if subtitle field is empty
    if(empty($subtitle)) {
        $validationErrorSubtitle = "<ul role=\"alert\"><li>Dieses Feld darf nicht leer sein.</li></ul>";
    } else if (strlen($subtitle) > 250) {
        $validationErrorSubtitle = "<ul role=\"alert\"><li>Dieses Feld darf nicht mehr als 250 Zeichen enthalten.</li></ul>";
    }

    // check if content top field is empty
    if(empty($content_top)) {
        $validationErrorContentTop = "<ul role=\"alert\"><li>Dieses Feld darf nicht leer sein.</li></ul>";
    }

    // check if content bottom field is empty
    if(empty($content_bottom)) {
        $validationErrorContentBottom = "<ul role=\"alert\"><li>Dieses Feld darf nicht leer sein.</li></ul>";
    }

    // if no validation errors, update article in database
    if(!$validationErrorTitle && !$validationErrorSubtitle && !$validationErrorContentTop && !$validationErrorContentBottom) {

        $queryUpdate = "UPDATE content_about SET title=?, subtitle=?, content_top=?, content_bottom=?";
        
        $stmt = mysqli_prepare($conn, $queryUpdate);
        mysqli_stmt_bind_param($stmt, 'ssss', $title, $subtitle, $content_top, $content_bottom);
        if(!mysqli_stmt_execute($stmt)) {
            echo mysqli_stmt_error($stmt);
        } else {
            header("Location: site-manager?updated");
            die();
        }
    }
    
} else {
    $titleValue = "";
    $subtitleValue = "";
    $contentTopValue = "";
    $contentBottomValue = "";

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include("../includes/head.inc.html")?>
    <title>CMS&nbsp;&ndash; Site Manager&nbsp;&ndash; Seite "About" bearbeiten | Jasmin's Travel Blog</title>
    <script src="../ckeditor/ckeditor.js"></script>

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
                        <span class="subheading">Ändere den Titel, den Untertitel oder den Text der Seite "About".</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h2 class="text-center">Seite "About" bearbeiten</h2>
                <br>
                <form action="edit_about" method="post">
                    <div class="control-group">
                        <div class="form-group controls">
                            <label for="title" class="floating-label-form-group label text-info border-0">Titel<span class="text-danger">*</span></label>
                            <input type="text" class="form-control bg-light border" name="title" id="title" value="<?=$aboutContent[0]['title_about']?>">
                            <div class="help-block text-danger pt-2" style="font-size: 14px;""><?=$validationErrorTitle?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group controls">
                            <label for="subtitle" class="floating-label-form-group label text-info border-0">Untertitel<span class="text-danger">*</span></label>
                            <input type="text" class="form-control bg-light border" name="subtitle" id="subtitle" value="<?=$aboutContent[0]['subtitle_about']?>">
                            <div class="help-block text-danger pt-2" style="font-size: 14px;""><?=$validationErrorSubtitle?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group controls">
                            <label for="content_top" class="floating-label-form-group label text-info border-0">Oberer Textinhalt<span class="text-danger">*</span></label>
                            <textarea name="content_top" id="content" rows="10" cols="80"><?=$aboutContent[0]['content_top']?></textarea>
                            <div class="help-block text-danger pt-2" style="font-size: 14px;""><?=$validationErrorContentTop?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group controls">
                            <label for="content_bottom" class="floating-label-form-group label text-info border-0">Unterer Textinhalt<span class="text-danger">*</span></label>
                            <textarea name="content_bottom" id="content" rows="10" cols="80"><?=$aboutContent[0]['content_bottom']?></textarea>
                            <div class="help-block text-danger pt-2" style="font-size: 14px;""><?=$validationErrorContentBottom?></div>
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
                                    Möchtest du wirklich abbrechen? Allfällige Änderungen werden nicht übernommen!
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
    <script>
    CKEDITOR.replace('content_top', {
        extraPlugins: 'editorplaceholder',
        editorplaceholder: 'Fange an etwas Grossartiges zu schreiben... :)',
        customConfig: 'MyConfig.js',
        height: "250px"
    });

    CKEDITOR.replace('content_bottom', {
        extraPlugins: 'editorplaceholder',
        editorplaceholder: 'Fange an etwas Grossartiges zu schreiben... :)',
        customConfig: 'MyConfig.js',
        height: "250px"
    });
    </script>

</body>

</html>
