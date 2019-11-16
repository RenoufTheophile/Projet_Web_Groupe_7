<?php

$cookieFin = time()+60*60*24;
setcookie("username", $_SESSION['username'], $cookieFin);
setcookie("role", $_SESSION['role'], $cookieFin);
setcookie("id", $_SESSION['id'], $cookieFin);






?>

