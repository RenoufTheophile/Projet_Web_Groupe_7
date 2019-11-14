
<?php
session_start();
if(isset($_FILES['fileToUpload']))
{
  include("../../AccerBDD.php");
    $bdd=connexobject("webproject","myparam");
    $email=$_SESSION['username'];
    $picture_description=$_POST['picture_description'];
	  $statement = $bdd->prepare("SELECT id FROM user WHERE email = ?");
    $statement->execute(array($email));
    $ligne = $statement->fetch();
    $id = $ligne[0];
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    $picture_photo=$_FILES["fileToUpload"]["name"];

    $req = $bdd->prepare('INSERT INTO picture (picture_id, id, picture_name, picture_description, likes) VALUES(NULL,?, ?, ?, NULL)');
    $req->execute(array($id,$picture_photo, $picture_description));

    foreach($_FILES["fileToUpload"] as $cle =>$valeur){
        echo"clé: $cle valeur: $valeur <br />";
    }
    $result=move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $picture_photo);
    if($result==TRUE){
        echo"<h2>Informations about the update</h2>
        <hr /><big>Le transfert est effectué ! $picture_photo ,$id,$picture_description</big>";
        echo"
    
    <a href=\"../../galery.php\"><button class=\"button\"><span>Back to Galery</span></button></a>";
      }

    }
    else{
        echo"<hr /> Erreur de transfert n°",$_FILES["fileToUpload"]["error"];
    }
?>
