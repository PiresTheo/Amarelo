<?php 
//data from cookies to $_SESSION
session_start();
$_SESSION['date_lastactivity'] = $_COOKIE["date_lastactivity"];

//Calcul points du profil et succes accomplis puis renvoi vers premiere_connexion2.php
echo '
<script type="text/javascript" src="assets/js/succes.js"></script>
<script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="cookie.js"></script>
<script>
calculNouveauSucces("'.$_SESSION['token_type'].'","'.$_SESSION['access_token'].'",0,"0,0,0,0,0,0",1);
</script>
';
?>


