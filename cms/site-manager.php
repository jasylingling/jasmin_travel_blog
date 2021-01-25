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


// get all contents from database
$query = "SELECT * FROM contents";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) { 
        $blogPosts [] = [
            'id' => $row['id'],
            'title' => $row['title'],
            'date' => $row['post_date']
        ];
    }
    // echo '<pre>';
    // print_r($blogPosts);
    // echo '</pre>';
    
} else {
    die("No results.");
}

// delete blogposts
if(isset($_POST['delete'])) {
    $cleanId = desinfect($_POST['delete']);
    $sqldelete = "DELETE FROM `contents` WHERE `id`=?";        
    $stmt = mysqli_prepare($conn, $sqldelete);
    mysqli_stmt_bind_param($stmt, 'i', $cleanId); // 'i' = 1 integer: id
    
    if (mysqli_stmt_execute($stmt)){
        header("Location: site-manager");
        die();
    } else {
        echo "error deleting the blog article";
    }
} 
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
                        <span class="subheading">Editieren, löschen oder etwas Neues kreieren? Just do it!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-10 mx-auto">
                <h2 class="text-center">Übersicht Blogartikel</h2>
                <br>
                <a href="create" class="btn btn-primary"><i class="fas fa-plus"></i> Neuer Artikel</a>
                <br>
                <br>
                <div class="table-responsive">                          
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titel</th>
                            <th scope="col">gepostet am</th>
                            <th></th>
                            <th></th>
                            </tr>
                        </thead>
                        <?php foreach (array_reverse($blogPosts) as $key => $value) { ?>
                        <tbody>
                            <tr>
                            <th scope="row"><?=$key+1?></th>
                            <td><a href="edit?id=<?=$value['id']?>"><?=$value['title']?></a></td>
                            <td><?=$value['date']?></td>
                            <td><a class="btn btn-primary" href="edit?id=<?=$value['id']?>"><i class="fas fa-edit"></i> Bearbeiten</a></td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletePost-<?=$value['id']?>"><i class="fas fa-trash-alt mr-1"></i> Löschen</button>
                                <!-- Modal -->
                                <div class="modal fade" id="deletePost-<?=$value['id']?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="deleteModal">Artikel <u><?=$value['title']?></u> löschen?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Möchtest du diesen Artikel wirklich löschen?
                                        </div>
                                        <form action="site-manager" method="post" class="modal-footer">
                                            <button type="delete" class="btn btn-danger" name="delete" value="<?=$value['id']?>">Löschen</button>
                                            <button type="button" class="btn btn-light border-dark" data-dismiss="modal">Abbrechen</button>
                                        </form>
                                        </div>
                                    </div>
                                </div>                            
                            </td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>

                    <h2 class="text-center">Übersicht About</h2>
                    <p class="text-center">would be greaaaaaaaat</p>

                    <h2 class="text-center">Übersicht Contact</h2>
                    <p class="text-center">would be greaaaaaaaat</p>

                </div>
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