<?php

include_once("AccerBDD.php");
$bdd = connexobject("webproject", "myparam");

$name_activity = $_POST['name_activity'];
$date_activity = $_POST['date_activity'];
$description_activity = $_POST['description_activity'];
$length_activity = $_POST['length_activity'];
$activity_price = $_POST['activity_price'];
$file_activity = $_POST['file_activity'];

$req = $bdd->prepare('INSERT INTO activity (activity_name, activity_dated, activity_description, activity_time, activity_cost, activity_image) VALUES(?, ?, ?, ?, ?, ?)');
$req->execute(array($name_activity, $date_activity, $description_activity, $length_activity, $activity_price, $file_activity));

?>