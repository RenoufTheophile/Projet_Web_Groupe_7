<div class="row">

<?php
    $bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $requete =$bdd->query("CALL list_activity()");

    while($data=$requete->fetch(PDO::FETCH_ASSOC)){
        echo " <a href='template_event.php?id=".$data['activity_id']."'>
                    <div class='content'>
                        <img src='../Image/event/".$data['activity_picture']."' alt='".$data['activity_name']."' style='width:100%'>
                        <h4>".$data['activity_name']."</h4>
                        <p>".$data['activity_cost']."‎€</p>
                    </div>
                </a>
                </div>";
    }
?>
</div>