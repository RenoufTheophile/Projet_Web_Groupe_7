<!--####################################
requete pour remplir template_panier
 #######################################-->

 <?php
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
    foreach ($panier_court as $produit => $nombre){

        $requete2 =$bdd->prepare("CALL info_goodies(:id)");
        $requete2->bindParam(':id',$produit);
        $requete2->execute();

        $data2=$requete2->fetch(PDO::FETCH_ASSOC);
            echo "<div class='produit_seul'>
                    <a href='template_produit.php?id=".$produit."'>
                        <div class='flottant'>
                            <img src='image_temp/".$data2['goodies_photo']."' class='image_p' alt='photo produit'/>
                        </div>
                        <div class='info_p'>
                            
                            <div class='name'> <strong>".$data2['goodies_name']."</strong></div>
                            <div class='quantité'> Quantité de cet article dans votre panier:".$nombre."</div>
                            <div class='prix'> Prix: ".$data2['goodies_cost']."€ </div>
                            <div class='catégorie'> Catégorie: ".$data2['goodies_category']."</div>
                            <div class='description'> Description: </br>".$data2['goodies_description']."</div>
                        </div>
                    </a>

                    <form action='/Projet_Web_Groupe_7/Webproject-MAIN/Boutique/supprime1_panier.php' method='post'>
                    <input type='hidden' name='id' value='".$produit."'/>
                    <input type='submit' name='valider' value='Retirer du panier un exemplaire'/>
                    </form>
                    <form action='/Projet_Web_Groupe_7/Webproject-MAIN/Boutique/supprime_panier.php' method='post'>
                    <input type='hidden' name='id' value='".$produit."'/>
                    <input type='submit' name='valider' value='Retirer du panier tout les exemplaires'/>
                    </form>
                </div>";

            
    
        $requete2->closeCursor();
    

    }
?>