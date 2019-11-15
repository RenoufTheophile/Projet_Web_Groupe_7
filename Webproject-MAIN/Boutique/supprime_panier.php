<?php
session_start();
header('Location:../template_panier.php');
$bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $id=$_POST['id'];
    $requete =$bdd->prepare("CALL info_panier(:id_u)");
    $requete->bindParam(':id_u',$_SESSION['id']);
    $requete->execute();

    $data=$requete->fetch(PDO::FETCH_ASSOC);
    $panier=str_replace(":".$id,"",$data['cart']);

    $requete->closeCursor();

    $requete2 =$bdd->prepare("CALL supprime_panier(:panier,:id_u)");
    
    $requete2->bindParam(':panier',$panier);
    $requete2->bindParam(':id_u',$_SESSION['id']);
    $requete2->execute();

?>