<?php
session_start();
header('Location:../template_panier.php');
$bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $id=$_POST['id'];
    $requete =$bdd->prepare("CALL info_panier(:id_u)");
    $requete->bindParam(':id_u',$_SESSION['id']);
    $requete->execute();

    $data=$requete->fetch(PDO::FETCH_ASSOC);
    $panier=explode(':',$data['cart']);
        
    $requete->closeCursor();

    $i=1;
    $panier_court=[];
    while (isset($panier[$i])){
        if (isset($panier_court[$panier[$i]])){
            $panier_court[$panier[$i]]+=1;
        }else{
            $panier_court[$panier[$i]]=1;
        }
    $i=$i+1;
    }
    $panier_court[$id]-=1;
    $panierlong="";
    foreach ($panier_court as $produit => $nombre){
        for ($i=0;$i<$nombre;$i++){
            $panierlong=$panierlong.":".$produit;
        }
    }

    $requete->closeCursor();

    $requete2 =$bdd->prepare("CALL supprime_panier(:panier,:id_u)");
    
    $requete2->bindParam(':panier',$panierlong);
    $requete2->bindParam(':id_u',$_SESSION['id']);
    $requete2->execute();
?>