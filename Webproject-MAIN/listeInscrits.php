<?php

require('fpdf181\fpdf.php');
include_once("AccerBDD.php");
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(160,10,'------------------------------------------LISTE DES INSCRITS------------------------------------------',0,1,'');

$pdf->Cell(40,10,' ',0,1,'c');

$bdd = connexobject("webproject", "myparam");

$req = $bdd->prepare('SELECT first_name,last_name,email FROM user INNER JOIN participate ON user.id = participate.id WHERE activity_id = ?');

$id_act=$_GET['id_act'];
$req->execute(array($id_act));
$ligne=$req->fetchAll();
foreach($ligne as $i => $value){
    $pdf->Cell(40,10,"Prenom: ".$ligne[$i][0],0,1);
    $pdf->Cell(40,10,"Nom: ".$ligne[$i][1],0,1);
    $pdf->Cell(40,10,"Mail: ".$ligne[$i][2],0,1);
    $pdf->Cell(40,10," ",0,1);
}

$pdf->Output();

/*Affichage en PDF des inscrits*/

?>
