<?php
require_once('../includes/config.inc.php');
require_once('../includes/functions.inc.php');


// ***************** AB HIER BEISPIEL RENÉ - ANPASSEEEN !! // BEITRÄGE BEARBEITEN (***UPDATE VON CR*U*D ***) ******************* 

//Überprüfe die GET Variable für den ersten Aufruf --> Sanitize ---> immer WICHTIG bei GET-Variablen!!
if ( isset($_GET["id"])){
    $cleanId = filter_var($_GET["id"], FILTER_SANITIZE_STRING);
}
elseif (isset($_POST['hiddenID'])) {
    // Beim zweiten Durchgang (Speichern) arbeite ich mit der POST-Variable, weil wir eine Versteckte Id auf der Seite platziert haben.
    $cleanId = filter_var($_POST['hiddenID'], FILTER_SANITIZE_STRING);
} 
else {
    //Script abbrechen wenn die GET oder POST-Variable nicht bekannt ist
    die("Weiss nicht welche Seite ich bearbeiten soll // Die Seite kann nicht aufgerufen werden. Damn Hacker"); //wenn ein Hacker probiert die URL zu manipulieren und anders aufzurufen
}  

//Hole die Daten zum Beabeiten aus der DB
$query1 = "SELECT * FROM contents WHERE id=".$cleanId; //Query bauen
$result1 = mysqli_query($con,$query1);  

if (mysqli_num_rows($result1) > 0){
    // $code = "<ul>";
    while($row = $result1->fetch_assoc()) {
    	$IDDB = $row["id"];
        $titleDB = $row["title"];
       	$shortDescDB = $row["short_desc"];
        $longDescDB = $row["long_desc"];
        
    }
   
}else {
    // $code .= "No results";
    die("Kann den Beitrag nicht finden.");
}



// //ist die Getvarable vorhanden testen
// echo $_GET["id"];

// require("credentials.php");
// Insert record
if(isset($_POST['go'])){
    $idForUpdate = $_POST['hiddenID'];
  $title = $_POST['title'];
  $short_desc = $_POST['short_desc'];
  $long_desc = $_POST['long_desc'];

  if($title != ''){
    // Hier muss update sein um das upzudeaten ***************************************************
    // 
    //---------------------------------------------------------
    $query2 = "UPDATE contents SET title='".$title."', short_desc='".$short_desc."', long_desc='".$long_desc."' WHERE id=$idForUpdate";
    // echo $query2;
    mysqli_query($con, $query2);
        die("Ich habe die Angaben gesichert");
    // mysqli_query($con, "UPDATE contents SET title = $title, short_desc = $short_desc, long_desc = $long_desc");
    // mysqli_query($con, "INSERT INTO contents(title,short_desc,long_desc) VALUES('".$title."','".$short_desc."','".$long_desc."') ");
    // header('location: index.php');
  }
}
// ***************** ENDE BEISPIEL RENÉ // BEITRÄGE BEARBEITEN (***UPDATE VON CR*U*D ***) ******************* 


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Schreiben php</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script src="../ckeditor/ckeditor.js"></script>
    </head>
    <style type="text/css">
    .cke_textarea_inline{
       border: 1px solid black;
    }
    </style>
    <body>
    <br><br>
<form method='post' action='update.php'>
       Title : 
       <input type="text" name="title" value="<?=$titleDB?>">
		<br><br>
       Short Description: 
       <textarea id='short_desc' name='short_desc' style='border: 1px solid black;'><?=$shortDescDB?></textarea><br>

       Long Description: 
       <textarea id='long_desc' name='long_desc' ><?=$longDescDB?></textarea><br>

       <input type="hidden" name="hiddenID" value="<?=$IDDB?>">

       <input type="submit" name="go" value="Speichern"> 
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