<?php
if(isset($_FILES['fileToUpload']))
{    include_once("AccerBDD.php");
    $bdd=connexobject("webproject","myparam");
            $act_name=$_POST['name_activity'];
            $act_date=$_POST['date_activity'];
            $act_description=$_POST['description_activity'];
            $act_time=$_POST['time_activity'];
            $act_price=$_POST['activity_price'];
            $act_size=$_POST['size'];
            
           
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $act_photo=$_FILES["fileToUpload"]["name"];
            $req = $bdd->prepare('INSERT INTO activity (activity_id,activity_name, activity_dated, activity_description, activity_time, activity_cost, activity_size, activity_picture, recurring) VALUES(NULL,?, ?, ?, ?, ?, ?, ?, NULL)');
            $req->execute(array($act_name, $act_date, $act_description,$act_time,$act_price, $act_size, $act_photo));

    foreach($_FILES["fileToUpload"] as $cle =>$valeur){
        echo"clé: $cle valeur: $valeur <br />";
    }
    $result=move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $act_photo);
    if($result==TRUE){
        echo"<hr /><big>Le transfert est effectué ! $act_photo</big>";}

    }
    else{
        echo"<hr /> Erreur de transfert n°",$_FILES["fileToUpload"]["error"];
        echo"$act_photo";
    }

    //start the database connection with the good db name and the good param file name        
            
       
   
?>
