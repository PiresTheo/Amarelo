<?php
session_start();
$_SESSION['points'] = $_COOKIE['points'];
$_SESSION['swim_dist'] = $_COOKIE['swim_dist'];
$_SESSION['swim_duree'] = $_COOKIE['swim_duree'];
$_SESSION['bike_dist'] = $_COOKIE['bike_dist'];
$_SESSION['bike_duree'] = $_COOKIE['bike_duree'];
$_SESSION['run_dist'] = $_COOKIE['run_dist'];
$_SESSION['run_duree'] = $_COOKIE['run_duree'];

$success = strval($_SESSION['swim_dist']).','.strval($_SESSION['swim_duree']).','.strval($_SESSION['bike_dist']).','.strval($_SESSION['bike_duree']).','.strval($_SESSION['run_dist']).','.strval($_SESSION['run_duree']);
require('interaction_bdd.php');
$ajout = ajouterUtilisateur($_SESSION['id'],$_SESSION['points'],strtotime($_SESSION['date_lastactivity']),$success);
if ($ajout==false) { //sécurité
    header('Location: http://127.0.0.1/Amarelo/deconnexion.php');
    exit();
}

//redirection au profil
header('Location: http://127.0.0.1/Amarelo/athlete_infos.php');


?>