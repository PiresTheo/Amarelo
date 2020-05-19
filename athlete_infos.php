<?php 
session_start();
echo '
    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="cookie.js"></script>
    <script type="text/javascript"> 
    $(document).ready(function() {
        $.ajax({
            url: "https://www.strava.com/api/v3/athlete",
            type: "GET",
            headers : { 
                "Accept": "application/json",
                "Authorization": "'.$_SESSION['token_type'].' '.$_SESSION['access_token'].'"},
            success: function(reponse, textStatus, xhr){
                //console.log(reponse);
                createCookie("photo", reponse.profile, "10");
                createCookie("city", reponse.city, "10");
                createCookie("state", reponse.state, "10");
                createCookie("country", reponse.country, "10");
                createCookie("sex", reponse.sex, "10");
                createCookie("club_name", reponse.clubs[0].name, "10");
                createCookie("club_city", reponse.clubs[0].city, "10");
                createCookie("club_state", reponse.clubs[0].state, "10");
                createCookie("club_country", reponse.clubs[0].country, "10");
                createCookie("club_sport", reponse.clubs[0].sport_type, "10");
                createCookie("club_photo", reponse.clubs[0].profile, "10");
            },
            error: function(error) {
                document.location.href="deconnexion.php";
            }
        })

        $.ajax({
            url: "https://www.strava.com/api/v3/athletes/'.$_SESSION['id'].'/stats",
            type: "GET",
            headers : { 
                "Accept": "application/json",
                "Authorization": "'.$_SESSION['token_type'].' '.$_SESSION['access_token'].'"},
            success: function(reponse2, textStatus, xhr){
                //console.log(reponse2);
                createCookie("nb_activites", reponse2.all_ride_totals.count+reponse2.all_run_totals.count+reponse2.all_swim_totals.count, "10");
            },
            error: function(error) {
                document.location.href="deconnexion.php";
            }
        })
    })
    </script>
    ';

require('interaction_bdd.php');
$bdd = bddConnect();
$requser = $bdd->prepare('SELECT * FROM users WHERE athlete_id = ?');
$requser->execute(array($_SESSION['id']));
$userinfo = $requser->fetch();
echo '<script type="text/javascript">createCookie("success_points", '.$userinfo['success_points'].', "10");</script>';
header('Location: http://127.0.0.1/Amarelo/profil.php');

?>