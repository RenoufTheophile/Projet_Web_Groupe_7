<!--####################################
page associé a la recherche d'un article pour aller sur la page de l'article
va avec autocomplete.php
 #######################################-->

<?php


$bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $name=$_POST['article'];

    $requete =$bdd->prepare("CALL redirect_name_id(:name)");
    $requete->bindParam(':name',$name);
    $requete->execute();
    

    
    $data=$requete->fetch(PDO::FETCH_ASSOC);
    
header('Location:template_produit.php?id='.$data['goodies_id']);
?>