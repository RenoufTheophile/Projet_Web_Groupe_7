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


    <main>
        <!-- MAIN (Center website) -->
        <div class="main">

            <h1>ÉVÉNEMENT DU BDE DU CESI - ROUEN</h1>

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
                        <img class="imgCar" src="Image/event/arbe.jpg" alt="top1evt">
                    </div>

                    <div class="item">
                        <img class="imgCar" src="Image/event/arbe.jpg" alt="top2evt">
                    </div>

                    <div class="item">
                        <img class="imgCar" src="Image/event/arbe.jpg" alt="top3evt">
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
            <?php
            $id_act = 1;
            ?>
            <!-- Portfolio Gallery Grid -->
            <div class="container-fluid">
                <div class="row">
                    <div class="column">
                        <div class="content">
                            <a class="lien-event" href="Event.php?id_event=<?php echo $id_act; ?>">
                                <?php
                                include_once("BDD_Read_Event.php");
                                $ligne = readEvent($id_act);
                                $id_act++;
                                echo"<img class='imageEvt' src='Image/event/arbe.jpg' alt='Event Image' style='width:100%;height: auto'>";
                                echo"<p class='titreEvt'>$ligne[1]</p>";
                                echo"<span class='label date'>$ligne[2]</span>";
                                echo"<span class='label price'>$ligne[5]€</span>";
                                ?>
                            </a>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                            <a class="lien-event" href="Event.php?id_event=<?php echo $id_act; ?>">
                                <?php
                                include_once("BDD_Read_Event.php");
                                $ligne = readEvent($id_act);
                                $id_act++;
                                echo"<img class='imageEvt' src='Image/event/arbe.jpg' alt='Event Image' style='width:100%;height: auto'>";
                                echo"<p class='titreEvt'>$ligne[1]</p>";
                                echo"<span class='label date'>$ligne[2]</span>";
                                echo"<span class='label price'>$ligne[5]€</span>";
                                ?>
                            </a>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                            <a class="lien-event" href="Event.php?id_event=<?php echo $id_act; ?>">
                                <?php
                                include_once("BDD_Read_Event.php");
                                $ligne = readEvent($id_act);
                                $id_act++;
                                echo"<img class='imageEvt' src='Image/event/arbe.jpg' alt='Event Image' style='width:100%;height: auto'>";
                                echo"<p class='titreEvt'>$ligne[1]</p>";
                                echo"<span class='label date'>$ligne[2]</span>";
                                echo"<span class='label price'>$ligne[5]€</span>";
                                ?>
                            </a>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                            <a class="lien-event" href="Event.php?id_event=<?php echo $id_act; ?>">
                                <?php
                                include_once("BDD_Read_Event.php");
                                $ligne = readEvent($id_act);
                                $id_act++;
                                echo"<img class='imageEvt' src='Image/event/arbe.jpg' alt='Event Image' style='width:100%;height: auto'>";
                                echo"<p class='titreEvt'>$ligne[1]</p>";
                                echo"<span class='label date'>$ligne[2]</span>";
                                echo"<span class='label price'>$ligne[5]€</span>";
                                ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <div class="content">
                            <a class="lien-event" href="Event.php?id_event=<?php echo $id_act; ?>">
                                <?php
                            include_once("BDD_Read_Event.php");
                            $ligne = readEvent($id_act);
                            $id_act++;
                            echo"<img class='imageEvt' src='Image/event/arbe.jpg' alt='Event Image' style='width:100%;height: auto'>";
                            echo"<p class='titreEvt'>$ligne[1]</p>";
                            echo"<span class='label date'>$ligne[2]</span>";
                            echo"<span class='label price'>$ligne[5]€</span>";
                            ?>
                            </a>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                            <a class="lien-event" href="Event.php?id_event=<?php echo $id_act; ?>">
                                <?php
                                include_once("BDD_Read_Event.php");
                                $ligne = readEvent($id_act);
                                $id_act++;
                                echo"<img class='imageEvt' src='Image/event/arbe.jpg' alt='Event Image' style='width:100%;height: auto'>";
                                echo"<p class='titreEvt'>$ligne[1]</p>";
                                echo"<span class='label date'>$ligne[2]</span>";
                                echo"<span class='label price'>$ligne[5]€</span>";
                                ?>
                            </a>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                            <a class="lien-event" href="Event.php?id_event=<?php echo $id_act; ?>">
                                <?php
                                include_once("BDD_Read_Event.php");
                                $ligne = readEvent($id_act);
                                $id_act++;
                                echo"<img class='imageEvt' src='Image/event/arbe.jpg' alt='Event Image' style='width:100%;height: auto'>";
                                echo"<p class='titreEvt'>$ligne[1]</p>";
                                echo"<span class='label date'>$ligne[2]</span>";
                                echo"<span class='label price'>$ligne[5]€</span>";
                                ?>
                            </a>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                            <a class="lien-event" href="Event.php?id_event=<?php echo $id_act; ?>">
                                <?php
                                include_once("BDD_Read_Event.php");
                                $ligne = readEvent($id_act);
                                $id_act++;
                                echo"<img class='imageEvt' src='Image/event/arbe.jpg' alt='Event Image' style='width:100%;height: auto'>";
                                echo"<p class='titreEvt'>$ligne[1]</p>";
                                echo"<span class='label date'>$ligne[2]</span>";
                                echo"<span class='label price'>$ligne[5]€</span>";
                                ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <div class="content">
                            <a class="lien-event" href="Event.php?id_event=<?php echo $id_act; ?>">
                                <?php
                                include_once("BDD_Read_Event.php");
                                $ligne = readEvent($id_act);
                                $id_act++;
                                echo"<img class='imageEvt' src='Image/event/arbe.jpg' alt='Event Image' style='width:100%;height: auto'>";
                                echo"<p class='titreEvt'>$ligne[1]</p>";
                                echo"<span class='label date'>$ligne[2]</span>";
                                echo"<span class='label price'>$ligne[5]€</span>";
                                ?>
                            </a>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                            <a class="lien-event" href="Event.php?id_event=<?php echo $id_act; ?>">
                                <?php
                                include_once("BDD_Read_Event.php");
                                $ligne = readEvent($id_act);
                                $id_act++;
                                echo"<img class='imageEvt' src='Image/event/arbe.jpg' alt='Event Image' style='width:100%;height: auto'>";
                                echo"<p class='titreEvt'>$ligne[1]</p>";
                                echo"<span class='label date'>$ligne[2]</span>";
                                echo"<span class='label price'>$ligne[5]€</span>";
                                ?>
                            </a>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                            <a class="lien-event" href="Event.php?id_event=<?php echo $id_act; ?>">
                                <?php
                                include_once("BDD_Read_Event.php");
                                $ligne = readEvent($id_act);
                                $id_act++;
                                echo"<img class='imageEvt' src='Image/event/arbe.jpg' alt='Event Image' style='width:100%;height: auto'>";
                                echo"<p class='titreEvt'>$ligne[1]</p>";
                                echo"<span class='label date'>$ligne[2]</span>";
                                echo"<span class='label price'>$ligne[5]€</span>";
                                ?>
                            </a>
                        </div>
                    </div>
                    <div class="column">
                        <div class="content">
                            <a class="lien-event" href="Event.php?id_event=<?php echo $id_act; ?>">
                                <?php
                                include_once("BDD_Read_Event.php");
                                $ligne = readEvent($id_act);
                                $id_act++;
                                echo"<img class='imageEvt' src='Image/event/arbe.jpg' alt='Event Image' style='width:100%;height: auto'>";
                                echo"<p class='titreEvt'>$ligne[1]</p>";
                                echo"<span class='label date'>$ligne[2]</span>";
                                echo"<span class='label price'>$ligne[5]€</span>";
                                ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="last">
                    <a class="lien-event" href="Event.php">
                        <img class="imageEvtLast" src="Images\arbe.jpg" alt="Event Image" style="width:100%">
                        <h1 class="titreEvt">Gros événement !</h1>
                        <span class='label date'>Date de l'événement</span>
                    </a>
                </div>

                <!-- END MAIN -->
            </div>

        </div>


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