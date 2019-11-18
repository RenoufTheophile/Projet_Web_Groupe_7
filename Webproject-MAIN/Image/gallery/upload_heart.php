<?php
 session_start();

$src =$_POST['src'];

  include("../../AccerBDD.php");

  $bdd=connexobject("webproject","myparam");

  $email=$_SESSION['username'];
  $statement = $bdd->prepare("CALL select_id(?)");
  $statement->execute(array($email));
  $ligne = $statement->fetch();
  $id = $ligne[0];

  $bdd2=connexobject("webproject","myparam");
  $stat=$bdd2->prepare("CALL select_picture(?)");
  $stat->execute(array($id));
  $ligne2=$stat->fetch();
  $picture=$ligne2[0];

  $bdd3=connexobject("webproject","myparam");
  $pic=$bdd3->prepare("CALL select_picture_id(?)");
  $pic->execute(array($src));
  $ligne3=$pic->fetch();
  $picture_id=$ligne3[0];

  $bdd4=connexobject("webproject","myparam");
  $likes=$bdd4->prepare("CALL select_likes(?,?)");
  $likes->execute(array($id,$picture_id));
  $ligne4=$likes->fetch();
  $like=$ligne4[0];
  if($like==NULL ){

    $bdd5=connexobject("webproject","myparam");
    $req = $bdd5->prepare("CALL insert_heart(?,?) ");
    $req->execute(array($id,$picture_id));
    echo "<p>".$id.",".$picture_id.",".$src."</p>";
  }if($like==!NULL){

  $bdd6=connexobject("webproject","myparam");
  $req2 = $bdd6->prepare("CALL delete_heart(?,?) ");
  $req2->execute(array($picture_id,$id));
  echo "<p>like update,".$picture_id.",".$id."</p>";
}

?>
