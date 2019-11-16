<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <script type="text/javascript" src="popup.js"></script>
        
    <title>Site Web BDE-CESI</title>
    </head>


<body id="Mbody" onLoad="popup('main.php', 'Site Web BDE-CESI')">
<header>
<?php
include("header.php");
?>
</header>
<?php


if(isset($_SESSION['connected'])){
    if($_SESSION['role']=="bdemember"){include("bdeTest.php");}
    elseif($_SESSION['role']=="student"){include("studentTest.php");}
    elseif($_SESSION['role']=="employee"){include("employeeTest.php");}
    
}

?>

<main class="main">

    <img class="CESI" src="Image/event/CESI.jpg" alt="CESI">

    <div class="textBlockMain">
        <h1 class="textMain">Une vie de campus adaptée aux étudiants pour les étudiants...</h1>
        <p class="paraphMain">Le campus CESI Rouen possède un BDE (Bureau des élèves) ayant pour but d’animer la vie sur le campus. Il accompagne les différents clubs (mini associations) dans leurs actions et représente tous les étudiants du campus. Ce même bureau a mis en place pour ces étudiants une boutique et propose des événements durant l'année scolaire.</p>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="column">
                <div class="content">
                    <a class="lien-content" href="BDE.php">
                        <img class='imageContent' src='Image\event\BDEmain.jpg' alt='Event Image' style='width:100%;height: auto'>
                        <p class='titreEvt'>Bureau Des Étudiants</p>
                        <p class='descriptionContent'>Représentant des élèves, organisent et présentent des événement pour les élèves et l'école. Ils permettent la bonne cohésion entre l'administration et les élèves et une bonne entente entre les promotions du CESI.</p>

                    </a>
                </div>
            </div>
            <div class="column">
                <div class="content">
                    <a class="lien-content" href="Events.php">
                        <img class='imageContent' src='Image\event\VIEASSOmain.jpg' alt='Event Image' style='width:100%;height: auto'>
                        <p class='titreEvt'>Clubs</p>
                        <p class="descriptionContent">Les clubs ou mini-associations permettent de se vider la tête dans le campus avec tout les étudiants du CESI.</p>

                    </a>
                </div>
            </div>
            <div class="column">
                <div class="content">
                    <a class="lien-content" href="Events.php">
                        <img class='imageContent' src='Image\event\eventMain.jpg' alt='Event Image' style='width:100%;height: auto'>
                        <p class='titreEvt'>Événements</p>
                        <p class="descriptionContent">Chers Cesiens venez découvrir la liste des événements en cours pour si vous le souhaitez vous y inscrire. N'oubliez pas de partagez vos avis sur les événements.</p>

                    </a>
                </div>
            </div>
            <div class="column">
                <div class="content">
                    <a class="lien-content" href="Events.php">
                        <img class='imageContent' src='Image\event\Pandamain.jpg' alt='Event Image' style='width:100%;height: auto'>
                        <p class='titreEvt'>Boutique</p>
                        <p class="descriptionContent">Dans cette boutique, vous pourrez trouvez les petits goodies que le BDE du CESI à en réserve. Il paraît qu'on devient plus beau avec un de ses goodies.</p>

                    </a>
                </div>
            </div>
        </div>




</main>


</body>

<?php
include("footer.php");
?>

</html>

