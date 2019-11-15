<?php
session_start();
header('Location:../template_panier.php');
$bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $id=$_POST['id'];
    $requete =$bdd->prepare("CALL ajout_panier(:id_p,:id_u)");
    $requete->bindParam(':id_p',$id);
    $requete->bindParam(':id_u',$_SESSION['id']);
    $requete->execute();

    
    
    $requete->closeCursor();

?>