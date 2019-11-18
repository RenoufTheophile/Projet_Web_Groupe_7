<!--####################################
 controle du prix pour les requetes
 #######################################-->
 <?php
    if (isset($_GET['prix_min'])){
        $prix_min=(int) $_GET['prix_min'];
        $prix_max=(int) $_GET['prix_max'];
    }else{
        $prix_min=0;
        $prix_max=1000;
    }
?>

<form name="prix" method="post" action="Boutique/change_prix.php">
        <div><span class='text_prix'>Prix-min: </span> <input type="number" name="prix_min" value='<?php echo $prix_min; ?>'/>‎<span class='euro'>€</span></div>
        <div class='prix2'><span class='text_prix'>Prix-Max: </span> <input type="number" name="prix_max" value='<?php echo $prix_max; ?>'/>‎<span class='euro'>€</span></div>
        <input type="submit" class='changement_prix' name="valider" value="Appliquer"/>
</form>