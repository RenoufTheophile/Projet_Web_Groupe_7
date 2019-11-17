<?php
session_start();
header('Location:../template_panier.php');
$bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $id=$_POST['id'];
    if (isset($_POST['quantité'])){
        $quantité=$_POST['quantité'];
    }else{
        $quantité=0;
    };
    print_r($_POST);
    for ($i=0;$i<$quantité;$i++){
    $requete =$bdd->prepare("CALL ajout_panier(:id_p,:id_u)");
    $requete->bindParam(':id_p',$id);
    $requete->bindParam(':id_u',$_SESSION['id']);
    $requete->execute();

    $requete->closeCursor();
    }

?>