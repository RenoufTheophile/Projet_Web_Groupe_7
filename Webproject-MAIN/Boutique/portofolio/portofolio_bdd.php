<div id="myBtnContainer">
<button class="btn active" onclick="filterSelection('all')"> Show all</button>
<?php
    if (isset($_GET['prix_min'])){
        $prix_min=(int) $_GET['prix_min'];
        $prix_max=(int) $_GET['prix_max'];
    }else{
        $prix_min=0;
        $prix_max=1000;
    }

    $bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $requete =$bdd->prepare("CALL categorie(:prix_min,:prix_max)");
    $requete->bindParam(':prix_min',$prix_min);
    $requete->bindParam(':prix_max',$prix_max);
    $requete->execute();

    $cat=array();
    $i=0;
    while($data=$requete->fetch(PDO::FETCH_ASSOC)){
        $cat[$data['goodies_category']]=$i;
        $i++;
        echo "<div>
        <button class='btn' onclick='filterSelection(".$cat[$data['goodies_category']].")'>".$data['goodies_category']."</button>
        </div>";
        
    }
 
?>
</div>

<!-- Portfolio Gallery Grid -->
<div class="row">

<?php
    $bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    $requete =$bdd->prepare("CALL controle_prix(:prix_min,:prix_max)");
    $requete->bindParam(':prix_min',$prix_min);
    $requete->bindParam(':prix_max',$prix_max);
    $requete->execute();

    while($data=$requete->fetch(PDO::FETCH_ASSOC)){
        echo "<div class='column " .$cat[$data['goodies_category']]."'>
                <a href='template_produit.php?id=".$data['goodies_id']."'>
                    <div class='content'>
                        <img src='image_temp/".$data['goodies_photo']."' alt='".$data['goodies_name']."' style='width:100%'>
                        <h4>".$data['goodies_name']."</h4>
                        <p>".$data['goodies_cost']."‎€</p>
                    </div>
                </a>";
                if (isset($_SESSION['connected'])){
                    echo"<form action='/Projet_Web_Groupe_7/Webproject-MAIN/Boutique/ajout_panier.php' method='post' id='form_panier'>
                            <input type='hidden' name='id' value='".$data['goodies_id']."'/>
                            <input type='submit' name='valider' value='Ajouter au panier'/>
                        </form>";
                }
                echo "</div>";
    }
    $requete->closeCursor();
?>
</div>