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
    <link rel="stylesheet" type="text/css" href="BDE.css"/>

    <title>Site Web BDE-CESI</title>
</head>


<body id="Mbody">
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

    <img class="CESI" src="Image/event/BDEkindarena.jpg" alt="CESI">

    <div class="textBlockMain">
        <h1 class="textBDE">Clubs de la vie associative du CESI Rouen</h1>
        <p class="paraphBDE">Chaque étudiant.e peut rejoindre l’organisation du BDS ou du BDE ou créer son club pour proposer une activité à partager avec les autres étudiant.e.s.</p>
        <p class="paraphBDE">Voici la liste non exhaustive des clubs (mini-associations) proposant des activités diverses :</p>
        <ul>
            <li>Club Football</li>
            <li>Club Vélo : Bikxia</li>
            <li>Club Rugby</li>
            <li>Club Arts-Martiaux : CES’Arts Martiaux</li>
            <li>Club Voile</li>
            <li>Club Basketball : Basket CESI Club</li>
            <li>Club Sports Urbains (skate, rollers, trottinette, …) : CESI Air</li>
            <li>Club Musique : Zixia</li>
            <li>Club Jeux de Rôle/Jeux de Société : CESIssant</li>
            <li>Club Karting</li>
            <li>Club E-Sport : CES’e-sport</li>
            <li>Club Robotique</li>
            <li>Club Objets Connectés</li>
        </ul>
        <p class="paraphBDE">Pour tout renseignement sur la vie associative du campus:</p>
        <ul>
            <li class="vieasso">Responsable de la vie associative: <a href="#!">achille.brossier@viacesi.fr</a></li>
            <ul>
                <li>BDE: Président <a href="#!">cedric.letalleur@viacesi.fr</a></li>
                <li>BDS: President <a href="#!">theophile.renouf@viacesi.fr</a></li>
            </ul>

        </ul>



</main>

<footer>
    <?php

    include("footer.php");

    ?>
</footer>

</body>

</html>