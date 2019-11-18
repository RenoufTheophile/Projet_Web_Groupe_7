<?php

include_once("AccerBDD.php");

$id_act=$_GET['id_act'];
$id=$_GET['id_user'];


$bdd = connexobject("webproject", "myparam");

$req = $bdd->prepare('INSERT INTO participate (id, activity_id) VALUES(?, ?)');
$req->execute(array($id, $id_act));

//Insertion des participants aux activités par leurs ID

?>