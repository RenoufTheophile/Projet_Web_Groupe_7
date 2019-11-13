<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="style.css"/>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    <title>Site Web BDE-CESI</title>
    </head>


<body>
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
<link rel="stylesheet" type="text/css" href="cookie.css"/>
<div id="cookieConsent">
    <div id="closeCookieConsent">x</div>
    This website is using cookies. <a href="#" target="_blank">More info</a>. <a class="cookieConsentOK">That's Fine</a>
</div>

</body>
<footer>
<?php

include("footer.php");

?>
</footer>
</html>

<script type="text/javascript" language="javascript">
$(document).ready(function(){   
    setTimeout(function () {
        $("#cookieConsent").fadeIn(200);
     }, 4000);
    $("#closeCookieConsent, .cookieConsentOK").click(function() {
        $("#cookieConsent").fadeOut(200);
    }); 
}); 
</script>