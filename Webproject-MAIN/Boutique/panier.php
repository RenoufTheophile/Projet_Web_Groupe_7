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
        $panier=str_split($data['cart']);
        
    $requete->closeCursor();

    $i=1;
    while (isset($panier[$i])){


        $requete2 =$bdd->prepare("CALL info_goodies(:id)");
        $requete2->bindParam(':id',$panier[$i]);
        $requete2->execute();

        $data2=$requete2->fetch(PDO::FETCH_ASSOC);
            echo "<div class='produit_seul'>
                    <a href='template_produit.php?id=".$panier[$i]."'>
                        <div class='flottant'>
                            <img src='image_temp/".$data2['goodies_photo']."' class='image_p' alt='photo produit'/>
                        </div>
                        <div class='info_p'>
                            
                            <div class='name'> <strong>".$data2['goodies_name']."</strong></div>
                            <div class='prix'> Prix: ".$data2['goodies_cost']."€ </div>
                            <div class='catégorie'> Catégorie: ".$data2['goodies_category']."</div>
                            <div class='description'> Description: </br>".$data2['goodies_description']."
                        </div>
                    </a>
                </div>";

            
    
        $requete2->closeCursor();
    $i=$i+2;
    }




?>
