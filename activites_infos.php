<?php 
session_start();
?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script>
$(document).ready(function(){
    $.ajax({
        url: "https://www.strava.com/api/v3/athlete/activities?page=<?php echo $_SESSION['numpage']?>&per_page=10",
        type: "GET",
        headers : { 
            "Accept": "application/json",
            "Authorization": "Bearer "+"<?php echo $_SESSION['access_token']?>"},
        success: function(reponse, textStatus, xhr){			
            createCookie("data", JSON.parse(reponse), "10");
            //document.location.href="premiere_connexion.php";
        },
        error: function(error) {
            document.location.href="deconnexion.php";
        }
    })
})
</script>

