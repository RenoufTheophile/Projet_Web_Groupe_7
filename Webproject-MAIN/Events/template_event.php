
<!DOCTYPE html>

<!--####################################
 Template pour afficher un produit seul
 #######################################-->

<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>Boutique du BDE</title>
    </head>

    <body>

    <!-- L'en-tête -->    
    <header>
     <!-- Le menu -->
     <?php include("header_boutique.php"); ?>
    <h1 class='titre_boutique'>Produit</h1>
    </header>


    <!-- Corps -->

    <div class="produits">
        <?php include('Event.php'); ?>
    </div><!--<?php
        if(isset($_SESSION['connected'])){
           
            echo"<div class='ajout_panier'>
                    <button name='panier'>Ajoutez au panier</button>
            </div> ";
        }
    ?>-->
    </body>

    <footer>
    <?php include("../footer.php"); ?>
    </footer>

</html>