<?php
session_start();
?>
<!DOCTYPE html>

<!--####################################
 Template pour afficher le panier utilisateur connecté
 #######################################-->

<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./assets/vendors/Bootstrap/bootstrap-4.3.1-dist/bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="Boutique/css/style_boutique.css" />
        <link rel="stylesheet" href="footer.css" />
        <link rel="stylesheet" href="header.css"/>

        <title>Boutique du BDE</title>
    </head>

    <body>

    <!-- L'en-tête -->    
    <header>
     <!-- Le menu -->
     <?php include("header.php"); ?>
    <h1 class='titre_boutique'>Panier</h1>
    </header>


    <!-- Corps -->
    <div id='validation'>
        <form action='Boutique/valide_panier.php' method='post' id='form_panier'>
            <input type='submit' name='validation' value='Passer commande'/>
        </form>
    </div>

    <div class="produits">
        <?php include('Boutique/panier.php'); ?>
    
    </body>

    <?php include("footer.php"); ?>

</html>