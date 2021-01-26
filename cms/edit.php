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

$articleID = $_GET['id'];
// get selected blog article from database
$query = "SELECT `country`, `title`, `subtitle`, `content_blogarticle` FROM `contents` WHERE `id`=?";
$statement = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($statement, 'i', $articleID);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);
// check if there is a match
if(mysqli_num_rows($result) == 1){ 
    while($row = mysqli_fetch_assoc($result)) { 
        $blogPosts [] = [
            'country' => $row['country'],
            'title' => $row['title'],
            'subtitle' => $row['subtitle'],
            'content' => $row['content_blogarticle']
        ];
    }
    // echo '<pre>';
    // print_r($blogPosts);
    // echo '</pre>';
    
} else {
    die("Beitrag kann nicht gefunden werden.");
}


$validationErrorCountry = "";
$validationErrorTitle = "";
$validationErrorSubtitle = "";
$validationErrorContent = "";

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
    // print_r($countryValue.$titleValue.$subtitleValue.$contentValue.$articleID);

    // check if country field is empty
    if(empty($country)) {
        $validationErrorCountry = "<ul role=\"alert\"><li>Dieses Feld darf nicht leer sein.</li></ul>";
    } else if (strlen($country) > 250) {
        $validationErrorCountry = "<ul role=\"alert\"><li>Dieses Feld darf nicht mehr als 250 Zeichen enthalten.</li></ul>";
    }
    
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

    // check if content field is empty
    if(empty($content)) {
        $validationErrorContent = "<ul role=\"alert\"><li>Dieses Feld darf nicht leer sein.</li></ul>";
    }

    // if no validation errors, update article in database
    if(!$validationErrorCountry && !$validationErrorTitle && !$validationErrorSubtitle && !$validationErrorContent) {

        $queryUpdate = "UPDATE contents SET country=?, title=?, subtitle=?, content_blogarticle=? WHERE id=?";
        
        $stmt = mysqli_prepare($conn, $queryUpdate);
        mysqli_stmt_bind_param($stmt, 'ssssi', $country, $title, $subtitle, $content, $articleID); // 'ssssi' = 4 strings and 1 integer: country, title, subtitle, content, id
        if(!mysqli_stmt_execute($stmt)) {
            echo mysqli_stmt_error($stmt);
        } else {
            header("Location: site-manager?updated");
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
    <title>CMS&nbsp;&ndash; Site Manager&nbsp;&ndash; Artikel bearbeiten | Jasmin's Travel Blog</title>

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
                        <span class="subheading">Editiere den gewählten Blogartikel nach Belieben oder füge Bilder hinzu.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h2 class="text-center">Artikel bearbeiten</h2>
                <?php foreach ($blogPosts as $key => $value) { ?>
                <form action="edit?id=<?=$articleID?>" method="post">
                    <div class="control-group">
                        <div class="form-group controls">
                            <label for="country">Land</label>
                            <input type="text" class="form-control bg-light border" name="country" id="country"
                                placeholder="Land" value="<?=$countryValue ? $countryValue : $value['country']?>">
                            <div class="help-block text-danger"><?=$validationErrorCountry?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group controls">
                            <label for="title">Titel</label>
                            <input type="text" class="form-control bg-light border" name="title" id="title"
                                placeholder="Titel" value="<?=$titleValue ? $titleValue : $value['title']?>">
                            <div class="help-block text-danger"><?=$validationErrorTitle?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group controls">
                            <label for="subtitle">Untertitel</label>
                            <input type="subtitle" class="form-control bg-light border" name="subtitle" id="subtitle"
                                placeholder="Untertitel" value="<?=$subtitleValue ? $subtitleValue : $value['subtitle']?>">
                            <div class="help-block text-danger"><?=$validationErrorSubtitle?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group controls">
                            <label for="content">Textinhalt</label>
                            <textarea class="form-control bg-light border" name="content" id="content" rows="10" cols="80" placeholder="Textinhalt"><?=$contentValue ? $contentValue : $value['content']?></textarea>
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
                <?php } ?>          
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
