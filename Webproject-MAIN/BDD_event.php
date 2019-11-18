<?php

if(isset($_FILES['fileToUpload']))
{
    include_once("AccerBDD.php");
$bdd = connexobject("webproject", "myparam");

$name_activity = $_POST['name_activity'];
$date_activity = $_POST['date_activity'];
$description_activity = $_POST['description_activity'];
$length_activity = $_POST['length_activity'];
$activity_price = $_POST['activity_price'];


    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    $file_activity=$_FILES["fileToUpload"]["name"];
$req = $bdd->prepare('INSERT INTO activity (activity_name, activity_dated, activity_description, activity_time, activity_cost, activity_image) VALUES(?, ?, ?, ?, ?, ?)');
$req->execute(array($name_activity, $date_activity, $description_activity, $length_activity, $activity_price, $file_activity));

//Insertion des données dans la table activity

    foreach($_FILES["fileToUpload"] as $cle =>$valeur){
        echo"clé: $cle valeur: $valeur <br />";
    }
    $result=move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file_activity);
    if($result==TRUE){
        echo"<hr /><big>Le transfert est effectué ! $file_activity</big>";}

}
else{
    echo"<hr /> Erreur de transfert n°",$_FILES["fileToUpload"]["error"];
}

?>