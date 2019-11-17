<?php
session_start();
$name =$_POST['name'];

  include("../../AccerBDD.php");
    $bdd=connexobject("webproject","myparam");
    $email=$_SESSION['username'];
    $picture_description=$_POST['picture_comment'];
	  $statement = $bdd->prepare("SELECT id FROM user WHERE email = ?");
    $statement->execute(array($email));
    $ligne = $statement->fetch();
    $id = $ligne[0];

    $req = $bdd->prepare('CALL insert_comment(?,?,?)');
    $req->execute(array($id, $name,$picture_description));
    echo "<p>".$id.",".$name.",".$picture_description."</p>";

?>
