<?php

include_once("AccerBDD.php");

$id_act=$_GET['id_act'];
$id=$_SESSION['id_user'];

//A FINIR CA NE T EN PREOCCUPE PAS POUR LE MOMENT

$req = $bdd->prepare('INSERT INTO participer (ID_UTILISATEUR, ID_ACTIVITE) VALUES(?, ?,)');
$req->execute(array($id_act, $id));

?>