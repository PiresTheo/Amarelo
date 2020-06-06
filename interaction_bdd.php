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
function ajouterUtilisateur($athlete_id,$success_points,$date_lastactivity,$success_acquired) {
	$bdd = bddConnect();
    $reqathlete = $bdd->prepare("SELECT * FROM Users WHERE athlete_id = ?");
    $reqathlete->execute(array($athlete_id));
    $athleteexist = $reqathlete->rowCount();
    if ($athleteexist == 0) {
        $insertuser = $bdd->prepare("INSERT INTO Users(athlete_id, success_points, date_lastactivity, success_acquired) VALUES (?, ?, ?, ?)");
        $insertuser->execute(array($athlete_id,$success_points,$date_lastactivity,$success_acquired));
        return true;
    } else {
        return false;   
    }
}

//mise a jour d'un utilisateur dans la bdd
function majUtilisateur($athlete_id,$success_points,$date_lastactivity,$success_acquired) {
	$bdd = bddConnect();
    $reqathlete = $bdd->prepare("UPDATE Users SET success_points = ?, date_lastactivity = ?, success_acquired = ? WHERE athlete_id = ?");
    $reqathlete->execute(array($success_points,$date_lastactivity,$success_acquired,$athlete_id));
    //VERIFICATION DE LA MAJ
    $reqathlete2 = $bdd->prepare("SELECT * FROM Users WHERE athlete_id = ?");
    $reqathlete2->execute(array($athlete_id));
    $infos = $reqathlete2->fetch();
    if ($infos['success_points']==$success_points && $infos['date_lastactivity']=$date_lastactivity && $infos['success_acquired']==$success_acquired) {
        return true;
    } else {
        return false;
    }
}
?>