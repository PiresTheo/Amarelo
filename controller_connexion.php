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



require('interaction_bdd.php');
$bdd = bddConnect();
$requser = $bdd->prepare('SELECT * FROM users WHERE athlete_id = ?');
$requser->execute(array($_SESSION['id']));
$userpresent = $requser->rowCount();
if ($userpresent == 0) { //premiere connexion
    echo '
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="cookie.js"></script>
    <script type="text/javascript" src="assets/js/succes.js"></script>
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
                    createCookie("date_lastactivity", reponse2[0].start_date_local, "10");
                    calculNouveauSucces("'.$_SESSION['token_type'].'","'.$_SESSION['access_token'].'",0,"0,0,0,0,0,0",1);
                } else { //aucune activité
                    createCookie("date_lastactivity", null, "10");
                    alert("Votre compte ne contient aucune activité");
                }
            },
            error: function(error) {
                document.location.href="deconnexion.php";
            }
        })
    })
    </script>
    ';
    
} else if ($userpresent == 1) { //deja connecté au moins une fois
    $infos = $requser->fetch();
    echo '
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="cookie.js"></script>
    <script type="text/javascript" src="assets/js/succes.js"></script>
    <script type="text/javascript"> 
    calculNouveauSucces("'.$_SESSION['token_type'].'","'.$_SESSION['access_token'].'",'.$infos['date_lastactivity'].',"'.$infos['success_acquired'].'",2);
    </script>
    ';
} else { //error
    header('Location: http://127.0.0.1/Amarelo/deconnexion.php');
}

?>

