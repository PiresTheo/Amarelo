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
                console.log(reponse);
                createCookie("city", reponse.city, "10");
                createCookie("state", reponse.state, "10");
                createCookie("country", reponse.country, "10");
                createCookie("sex", reponse.sex, "10");
                document.location.href="profil.php";
            },
            error: function(error) {
                document.location.href="deconnexion.php";
            }
        })
    })
    </script>
    ';
?>