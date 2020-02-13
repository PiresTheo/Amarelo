<?php 

//data from cookies to $_SESSION
session_start();
$_SESSION['token_type'] = $_COOKIE["token_type"];
$_SESSION['expires_at'] = $_COOKIE["expires_at"];
$_SESSION['expires_in'] = $_COOKIE["expires_in"];
$_SESSION['refresh_token'] = $_COOKIE["refresh_token"];
$_SESSION['access_token'] = $_COOKIE["access_token"];
$_SESSION['id'] = $_COOKIE["id"];
$_SESSION['firstname'] = $_COOKIE["firstname"];
$_SESSION['lastname'] = $_COOKIE["lastname"];
$_SESSION['city'] = $_COOKIE["city"];
$_SESSION['state'] = $_COOKIE["state"];
$_SESSION['country'] = $_COOKIE["country"];
$_SESSION['sex'] = $_COOKIE["sex"];

$id = $_SESSION['id'];
require('model_connexion.php');
$bdd = bddConnect();
$requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
$requser->execute(array($id));
$userpresent = $requser->rowCount();
if ($userpresent == 0) { //premiere connexion
    echo '
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="cookie.js"></script>
    <script type="text/javascript"> 
    $(document).ready(function() {
        $.ajax({
            url: "https://www.strava.com/api/v3/athlete/activities?per_page=1&page=1",
            type: "GET",
            headers : { 
                "Accept": "application/json",
                "Authorization": "'.$_SESSION['token_type'].' '.$_SESSION['access_token'].'"},
            success: function(reponse2, textStatus, xhr){		
                if (reponse2.length > 0) { //au moins une activité sur le compte
                    createCookie("start_date_local_lastactivity", reponse2[0].start_date_local, "10");
                } else { //aucune activité
                    createCookie("start_date_local_lastactivity", null, "10");
                    alert("Votre compte ne contient aucune activité");
                }
            },
            error: function(error) {
                document.location.href="index.html";
            }
        })
    })
    </script>
    ';
    
} else if ($userpresent == 1) { //deja connecté au moins une fois
    echo 'userpresent == 1';
} else { //error
    alert("erreur base de données");
}
?>




//COOKIE CREER MAIS IMPOSSIBLE DE LE TRAITER DANS LA PAGE CAR PHP AVANT JS