<?php
session_start();
header('Location:../template_panier.php');
$bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    $id = $_SESSION['id'];
    $requete =$bdd->prepare("CALL info_panier(:id)");
    $requete->bindParam(':id',$id);
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
    print_r($panier_court);
    foreach ($panier_court as $produit => $nombre){
        $requete3 =$bdd->prepare("CALL ajout_commande(:id_p,:id_u,:quantite)");
        $requete3->bindParam(':id_p',$produit);
        $requete3->bindParam(':id_u',$id);
        $requete3->bindParam(':quantite',$nombre);
        print_r($produit);
        print_r($id);
        print_r($nombre);
        $requete3->execute();
        $i=$i+1;
        $requete3->closeCursor();
    }
    

    $panier="";

    $requete2 =$bdd->prepare("CALL supprime_panier(:panier,:id_u)");
        
    $requete2->bindParam(':panier',$panier);
    $requete2->bindParam(':id_u',$_SESSION['id']);
    $requete2->execute();

    $requete2->closeCursor();

?>