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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="bootstrap/bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="event.css"/>

    <title>Événements - BDE</title>
</head>

<body id="Ebody">

<header>
    <?php
    include_once("header.php");
    include_once("BDD_Read_Event.php");
    $ligne = readEvent();
    $data = countAct();
    $data2 = countParticipation();
    $imgCar1 = readEvent3($data2[0][0]);
    $imgCar2 = readEvent3($data2[1][0]);
    $imgCar3 = readEvent3($data2[2][0]);

    ?>
</header>


<main>
    <!-- MAIN (Center website) -->
    <div class="main">

        <h2>LES ÉVÉNEMENTS DU CESI ROUEN</h2>

        //Carousel avec les images des 3 événements les plus proches par rapport à aujourd'hui

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <div class="item active">
                    <?php echo"<img class='imgCar' src='Image/event/".$imgCar1[6]."' alt='top1Evt'>";?>
                </div>

                <div class="item">
                    <?php echo"<img class='imgCar' src='Image/event/".$imgCar2[6]."' alt='top1Evt'>";?>
                </div>

                <div class="item">
                    <?php echo"<img class='imgCar' src='Image/event/".$imgCar3[6]."' alt='top1Evt'>";?>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        //Affichage de la liste des événements
        <!-- Portfolio Gallery Grid -->
        <div class="container-fluid">
            <div class="row">
                <?php
                for ($i = 0; $i <= $data-1; $i++){
                    $id_act = $ligne[$i][0];
                    echo "<div class='column'>";
                    echo "<div class='content'>";
                    echo "<a class='lien-event' href='Event.php?id_event=".$id_act."'>";
                    echo"<img class='imageEvt' src='Image/event/".$ligne[$i][6]."' alt='Event Image' style='width:100%;height: auto'>";
                    echo"<p class='titreEvt'>".$ligne[$i][1]."</p>";
                    echo"<span class='label date'>".$ligne[$i][2]."</span>";
                    echo"<span class='label price'>".$ligne[$i][5]."€</span>";

                    echo "</a>";
                    echo "</div>";
                    echo "</div>";
                }?>
            </div>


            <!-- END MAIN -->
        </div>

    </div>

    //Bouton accédant à un formulaire pour ajouter un événement
    <a href="AddEvent.php">
        <button type="button" class="btn btn-warning" style="
                    display: block;
                    margin: auto;
                    margin-bottom: 25px;
                ">Ajouter événement</button>
    </a>
</main>

<?php
include_once("footer.php");
?>




</body>
</html>