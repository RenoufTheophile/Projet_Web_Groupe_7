<?php

include_once("AccerBDD.php");

$id_act=$_GET['id_act'];
$id=$_GET['id_user'];

//A FINIR CA NE T EN PREOCCUPE PAS POUR LE MOMENT

$bdd = connexobject("webproject", "myparam");

$req = $bdd->prepare('INSERT INTO participate (id, activity_id) VALUES(?, ?)');
$req->execute(array($id, $id_act));

?>