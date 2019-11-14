<?php
session_start();
  include("../../AccerBDD.php");
  $bdd=connexobject("webproject","myparam");

  $email=$_SESSION['username'];
  $statement = $bdd->prepare("SELECT id FROM user WHERE email = ?");
  $statement->execute(array($email));
  $ligne = $statement->fetch();
  $id = $ligne[0];

  $stat=$bdd->prepare("SELECT picture_id FROM picture WHERE id=? ");
  $stat ->execute(array($id));
  $ligne2=$stat->fetch();
  $picture_id=$ligne2[0];

  if($picture_id==NULL){
    $req = $bdd->prepare('INSERT INTO `commentary` (commentary_id, id, picture_id, comment, likes) VALUES(NULL,?, ?, NULL, 1)) ');
    $req->execute(array($id,$picture_id));
    echo "<p>".$id."</p>";
  }else{
  $req = $bdd->prepare('UPDATE `commentary` SET `likes`= `likes`+ 1 WHERE id=?) ');
  $req->execute(array($like,$id));
  echo "<p>like update</p>";
}

?>
