<?php

function readEvent(){
    include_once("AccerBDD.php");
    $bdd = connexobject("webproject", "myparam");


    $req = $bdd->prepare('select * from activity order by activity_dated ASC');

    $req->execute(array());
    $ligne=$req->fetchAll();


    return $ligne;

}

function readEvent2(){
    include_once("AccerBDD.php");
    $bdd = connexobject("webproject", "myparam");


    $req = $bdd->prepare('select * from activity');

    $req->execute(array());
    $ligne=$req->fetchAll();


    return $ligne;

}

function readEvent3($id_act){
    include_once("AccerBDD.php");
    $bdd = connexobject("webproject", "myparam");


    $req = $bdd->prepare('select * from activity where activity_id=?');

    $req->execute(array($id_act));
    $ligne=$req->fetch();


    return $ligne;

}

function countAct(){
    include_once("AccerBDD.php");
    $bdd = connexobject("webproject", "myparam");


    $req = $bdd->prepare('select count(activity_id) from activity');

    $req->execute(array());
    $ligne=$req->fetch();

    return $ligne[0];
}

function countParticipation(){
    include_once("AccerBDD.php");
    $bdd = connexobject("webproject", "myparam");


    $req = $bdd->prepare('select activity_id, count(id) from participate GROUP BY activity_id ORDER BY `count(id)` DESC');

    $req->execute(array());
    $ligne=$req->fetchAll();


    return $ligne;

    //Récupération des données de la table activités dans l'ordre
}

// $id_act = $ligne[0];
// $nom_act = $ligne[1];
// $date_act = $ligne[2];
//$description_act = $ligne[3];
//$temps_act = $ligne[4];
//$prix_act = $ligne[5];
//$recurrence_act = $ligne[6];
//$image_act = $ligne[7];

?>