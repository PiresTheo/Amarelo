<?php 
echo '
<script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="cookie.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	// REQUETE DU TOKEN
	var qs = new URLSearchParams(window.location.search);
	var code = qs.get("code");
	var data = {
		client_id: "41768",
		client_secret: "2311a3b45f8ddeff32f72c86ab44dc3da24d317c",
		code: code,
		grant_type: "authorization_code"
	};
	$.ajax({
		url: "https://www.strava.com/oauth/token",
		type: "POST",
		data: data,
		success: function(reponse, textStatus, xhr){
			//console.log(reponse);
			
			//Envoi de la reponse dans des cookies (reponse)
			createCookie("token_type", reponse.token_type, "10");
			createCookie("expires_at", reponse.expires_at, "10");
			createCookie("expires_in", reponse.expires_in, "10");
			createCookie("refresh_token", reponse.refresh_token, "10");
			createCookie("access_token", reponse.access_token, "10");
			createCookie("id", reponse.athlete.id, "10");
			createCookie("firstname", reponse.athlete.firstname, "10");
			createCookie("lastname", reponse.athlete.lastname, "10");
			
			document.location.href="controller_connexion.php";
		},
		error: function(error){
			document.location.href="deconnexion.php";
		}
	})
})
</script>
';

?>
