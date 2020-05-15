<?php
//connexion à la bdd
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

//ajoute un utilisateur dans la bdd si il n'existe pas deja
function ajouterUtilisateur($athlete_id,$success_points,$list_success,$date_lastactivity) {
	$bdd = bddConnect();
    $reqathlete = $bdd->prepare("SELECT * FROM Users WHERE athlete_id = ?");
    $reqathlete->execute(array($athlete_id));
    $athleteexist = $reqathlete->rowCount();
    if ($athleteexist == 0) {
        $insertuser = $bdd->prepare("INSERT INTO Users(athlete_id, success_points, list_success, date_lastactivity) VALUES (?, ?, ?, ?)");
        $insertuser->execute(array($athlete_id,$success_points,$list_success,$date_lastactivity));
        return true;
    } else {
        return false;   
    }
}
?>