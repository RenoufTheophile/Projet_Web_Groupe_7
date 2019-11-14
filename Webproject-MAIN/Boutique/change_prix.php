<!--####################################
page associé aux input de prix
 #######################################-->

 <?php
$prix_min=$_POST['prix_min'];
$prix_max=$_POST['prix_max'];
header('Location:Boutique_up.php?prix_min='.$prix_min.'&prix_max='.$prix_max);
?>
