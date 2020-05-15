<?php 
//data from cookies to $_SESSION
session_start();
$_SESSION['date_lastactivity'] = $_COOKIE["date_lastactivity"];

//ajoute à la bdd
require('interaction_bdd.php');
$ajout = ajouterUtilisateur($_SESSION['id'],0,"[]",strtotime($_SESSION['date_lastactivity']));
if ($ajout==false) { //sécurité
    header('Location: http://127.0.0.1/Amarelo/deconnexion.php');
    exit();
}

//recuperer toutes les activités et comparés ou faire fonction commune à premiere connexion et autre connexion


//redirection au profil
header('Location: http://127.0.0.1/Amarelo/athlete_infos.php');



?>