<!doctype html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="event.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="bootstrap/bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <title>Événements - BDE</title>
</head>

<body id="Ebody">

<header>
    <?php
    include_once("header.php");
    ?>
</header>

<?php
include_once("BDD_Read_Event.php");
?>

<main>
    <!-- MAIN (Center website) -->
    <div class="main">

        <h1>ÉVÉNEMENT DU BDE DU CESI - ROUEN</h1>




        <div class="last">
            <?php
            $id_event= $_GET['id_event'];
            $id_user=$_SESSION['id'];
            $ligne = readEvent($id_event);
            $ligne = readEvent($_GET['id_event']);
            echo"<img class='imageEvtLast' src='Images\arbe.jpg' alt='Event Image' style='width:100%;height: auto'>";
            echo"<p class='titreEvt2'>$ligne[1]</p>";
            echo"<p class='descrition'>$ligne[3]</p>";
            ?>
            <a href="inscriptionEvent.php?id_act=<?php$id_event."&id_user=".$id_user?>">
                <button type="button" class="btn btn-warning">S'inscrire</button>
            </a>

        </div>

        <!-- END MAIN -->
    </div>
</main>

<?php
include_once("footer.php");
?>




</body>
</html>
