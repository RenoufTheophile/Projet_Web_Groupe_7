<?php

session_start();
include("AccerBDD.php");

$couriel=$_SESSION['username'];
$picture_description=$_POST['picture_description'];
$name=$_POST['picture_name'];
$bdd=connexobject("webproject","myparam");
$pic=$bdd->prepare("SELECT email FROM `user` WHERE role=bdemember");
$pic ->execute();
$ligne=$pic->fetchall();
foreach ($ligne as $key => $value) {
  $email=$ligne[$key]['email'];
  $to=$email;
  $subject="Images inaproprier";
  $message="The picture ".$name." is reported for the reason ".$picture_description."";
  $headers=array(
    'From' => $couriel,
    'Reply-to' => $couriel,
    'X-Mailer' => 'PHP/'.phpversion()
  );
  mail($to, $subject,$message,$headers);
echo "<p>vous avez envoyer un email</p>";
}
 ?>
