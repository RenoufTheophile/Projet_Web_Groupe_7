<!--####################################
requete pour remplir template_produit
 #######################################-->

<?php
    $bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $id=$_GET['id'];
    $requete =$bdd->prepare("CALL info_goodies(:id)");
    $requete->bindParam(':id',$id);
    $requete->execute();

    $data=$requete->fetch(PDO::FETCH_ASSOC);
        echo "<div class='produit_seul'>
                <div class='flottant'>
                    <img src='image_temp/".$data['goodies_photo']."' class='image_p' alt='photo produit'/>
                </div>
                <div class='info_p'>
                    
                    <div class='name'> <strong>".$data['goodies_name']."</strong></div>
                    <div class='prix'> Prix: ".$data['goodies_cost']."€ </div>
                    <div class='catégorie'> Catégorie: ".$data['goodies_category']."</div>
                    <div class='description'> Description: </br>".$data['goodies_description']."</div>
                </div>";
                if (isset($_SESSION['connected'])){
                    echo"<form action='/Projet_Web_Groupe_7/Webproject-MAIN/Boutique/ajout_panier.php' method='post' >
                    <input type='hidden' name='id' value='".$id."'/>
                    Nombres d'exemplaires<input name='quantité' required/>
                    <input type='submit' name='valider' value='Ajouter au panier'/>
                </form>";
                }
                   
            echo"</div>";
    
    
    $requete->closeCursor();

?>