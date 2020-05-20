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
                createCookie("shoes_name", reponse.shoes[0].name, "10");
                createCookie("shoes_distance", (reponse.shoes[0].distance/1000).toFixed(2) + " km", "10");
                createCookie("bikes_name", reponse.bikes[0].name, "10");
                createCookie("bikes_distance", (reponse.bikes[0].distance/1000).toFixed(2) + " km", "10");
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
                createCookie("rides_count", reponse2.all_ride_totals.count, "10");
                createCookie("rides_distance", (reponse2.all_ride_totals.distance/1000).toFixed(2) + " km", "10");
                createCookie("rides_movingtime", convertTime(reponse2.all_ride_totals.moving_time), "10");
                createCookie("rides_elevation", (reponse2.all_ride_totals.elevation_gain/1000).toFixed(2) + " km", "10");
                createCookie("runs_count", reponse2.all_run_totals.count, "10");
                createCookie("runs_distance", (reponse2.all_run_totals.distance/1000).toFixed(2) + " km", "10");
                createCookie("runs_movingtime", convertTime(reponse2.all_run_totals.moving_time), "10");
                createCookie("runs_elevation", (reponse2.all_run_totals.elevation_gain/1000).toFixed(2) + " km", "10");
                createCookie("swims_count", reponse2.all_swim_totals.count, "10");
                createCookie("swims_distance", (reponse2.all_swim_totals.distance/1000).toFixed(2) + " km", "10");
                createCookie("swims_movingtime", convertTime(reponse2.all_swim_totals.moving_time), "10");
            },
            error: function(error) {
                document.location.href="deconnexion.php";
            }
        })
    })

    function convertTime( seconds ) {
        var hour, minute;
        minute = Math.floor(seconds / 60);
        seconds = seconds % 60;
        hour = Math.floor(minute / 60);
        minute = minute % 60;
        return hour+":"+twoDigit(minute)+":"+twoDigit(seconds);
    }
    
    function twoDigit(n) {
        return (n < 10 ? \'0\' : \'\') + n;
    }
    
    </script>
    ';

require('interaction_bdd.php');
$bdd = bddConnect();
$requser = $bdd->prepare('SELECT * FROM users WHERE athlete_id = ?');
$requser->execute(array($_SESSION['id']));
$userinfo = $requser->fetch();
echo '<script type="text/javascript">createCookie("success_points", '.$userinfo['success_points'].', "10");
document.location.replace("http://127.0.0.1/Amarelo/profil.php");
</script>';
?>