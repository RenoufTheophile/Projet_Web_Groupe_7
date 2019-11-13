<?php

function readEvent($id_act){
    include_once("AccerBDD.php");
    $bdd = connexobject("webproject", "myparam");

    $req = $bdd->prepare('SELECT * FROM activity WHERE activity_id = ?');

//execute the statement to select the password by the email/account name
    $req->execute(array($id_act));
    $ligne=$req->fetch();

    return $ligne;

}

   // $nom_act = $ligne[1];
   // $date_act = $ligne[2];
    //$description_act = $ligne[3];
    //$temps_act = $ligne[4];
    //$prix_act = $ligne[5];
    //$recurrence_act = $ligne[6];






?>