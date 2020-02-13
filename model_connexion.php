<?php
function bddConnect() {
	try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd_amarelo;charset=utf8', 'root', '');
        return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function ajouterUtilisateur($athlete_id,$username,$firstname,$lastname,$city,$state,$country,$sex) {
	$bdd = bddConnect();
    $reqathlete = $bdd->prepare("SELECT * FROM Users WHERE athlete_id = ?");
    $reqathlete->execute(array($athlete_id));
    $athleteexist = $reqathlete->rowCount();
    if ($athleteexist == 0) {
        $insertuser = $bdd->prepare("INSERT INTO Users(athlete_id, username, firstname, lastname, city, state, country, sex) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $insertuser->execute(array($athlete_id,$username,$firstname,$lastname,$city,$state,$country,$sex));
        return true;
    } else {
        return false;   
    }
}
?>