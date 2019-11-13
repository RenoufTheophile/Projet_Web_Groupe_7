<?php
    $bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $id=$_GET['id'];
    $requete =$bdd->query("CALL list_activity($id)");

    $data=$requete->fetch(PDO::FETCH_ASSOC);
        echo "<div class='event_seul'>
                <div class='flottant'>
                    <img src='../Image/event/".$data['activity_picture']."' class='image_p' alt='photo event'/>
                </div>
                <div class='info_p'>
                    
                    <div class='name'> <strong>".$data['activity_name']."</strong></div>
                    <div class='prix'> Prix: ".$data['activity_cost']."€ </div>
                    <div class='catégorie'> Catégorie: ".$data['activity_size']."</div>
                    <div class='description'> Description: </br>".$data['activity_description']."</div>
                </div>
                   
            </div>";
    
    
    $requete->closeCursor();

?>