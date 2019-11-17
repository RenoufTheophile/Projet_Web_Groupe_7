<?php
 session_start();

$src =$_POST['src'];

  include("../../AccerBDD.php");

  $bdd=connexobject("webproject","myparam");

  $email=$_SESSION['username'];
  $statement = $bdd->prepare("SELECT id FROM user WHERE email = ?");
  $statement->execute(array($email));
  $ligne = $statement->fetch();
  $id = $ligne[0];

  $bdd2=connexobject("webproject","myparam");
  $stat=$bdd2->prepare("SELECT picture_id FROM ` commentary` WHERE  id=?");
  $stat ->execute(array($id));
  $ligne2=$stat->fetch();
  $picture=$ligne2[0];

  $bdd3=connexobject("webproject","myparam");
  $pic=$bdd3->prepare("SELECT picture_id FROM `picture` WHERE picture_name=?");
  $pic ->execute( array($src));
  $ligne3=$pic->fetch();
  $picture_id=$ligne3[0];

  $bdd4=connexobject("webproject","myparam");
  $likes=$bdd4->prepare("SELECT likes FROM `commentary` WHERE id=? AND picture_id=?");
  $likes ->execute( array($id,$picture_id));
  $ligne4=$likes->fetch();
  $like=$ligne4[0];
  if($like==NULL ){


    $req = $bdd->prepare("INSERT INTO `commentary` (commentary_id,id,picture_id,comment,likes) VALUES (NULL,?,?,NULL,?) ");
    $req->execute(array($id,$picture_id,1));
    echo "<p>".$id.",".$picture_id.",".$src."</p>";
  }else{
  $req = $bdd->prepare('CALL delete_like(?) ');
  $req->execute(array($id));
  echo "<p>like update,".$id."</p>";
}

?>
