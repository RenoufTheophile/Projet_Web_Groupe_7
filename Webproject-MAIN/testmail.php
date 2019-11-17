<?php

    ini_set( 'display_errors', 1 );

    error_reporting( E_ALL );

    $from = "renouf.theophile@gmail.com";

    $to = "theophile.renouf@viacesi.fr";

    $subject = "Vérification PHP mail";

    $message = "PHP mail marche";

    $headers = "From:" . $from;

    mail($to,$subject,$message, $headers);

    echo "L'email a été envoyé.";
?>
