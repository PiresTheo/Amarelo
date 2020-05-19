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
var data;
$(document).ready(function(){
    $.ajax({
        url: "https://www.strava.com/api/v3/athlete/activities?page=<?php echo $_SESSION['numpage']?>&per_page=10",
        type: "GET",
        headers : { 
            "Accept": "application/json",
            "Authorization": "Bearer "+"<?php echo $_SESSION['access_token']?>"},
        success: function(reponse, textStatus, xhr){			
            var table = document.getElementById("tableau");
			for (let i=0; i<Object.keys(reponse).length; i++) {
				var row = table.insertRow(i+1);
				var cell1 = row.insertCell(0);
				var cell2 = row.insertCell(1);
				var cell3 = row.insertCell(2);
				var cell4 = row.insertCell(3);
				var cell5 = row.insertCell(4);
				var cell6 = row.insertCell(5);
				cell1.innerHTML = reponse[i].type;
				cell2.innerHTML = reponse[i].start_date.substring(8, 10).concat("-",reponse[i].start_date.substring(5, 7),"-",reponse[i].start_date.substring(0, 4));
				cell3.innerHTML = reponse[i].name;

				var hour = convertS(reponse[i].moving_time).hour;
				var minute = convertS(reponse[i].moving_time).minute;
				var seconds = convertS(reponse[i].moving_time).seconds;
				if (hour==0 && minute==0) {
					cell4.innerHTML = seconds+"s";
				} else if (hour==0) {
					cell4.innerHTML = minute+":"+twoDigit(seconds);
				} else {
					cell4.innerHTML = hour+":"+twoDigit(minute)+":"+twoDigit(seconds);
				}
				
				if (reponse[i].type=="Swim") {
					cell5.innerHTML = (reponse[i].distance).toFixed(0)+" m";
				} else {
					cell5.innerHTML = (reponse[i].distance/1000).toFixed(2)+" km";
				}

				cell6.innerHTML = reponse[i].total_elevation_gain.toFixed(0)+" m";
			}
			var button1 = document.getElementById("button_back");
			<?php if ($_SESSION['numpage']>1) {?>
				button1.innerHTML ="<button onclick='backward()'><</button>";
			<?php } ?>
			var button2 = document.getElementById("button_for");
			<?php if ($_SESSION['numpage']<=($_SESSION['nb_activites']/10)) {?>
				button2.innerHTML ="<button onclick='forward()''>></button>";
			<?php } ?>
        },
        error: function(error) {
            document.location.href="deconnexion.php";
        }
    })
})

function convertS( seconds ) {
    var hour, minute;
    minute = Math.floor(seconds / 60);
    seconds = seconds % 60;
    hour = Math.floor(minute / 60);
    minute = minute % 60;
    return {
        hour: hour,
        minute: minute,
        seconds: seconds
    };
}

function twoDigit(n) {
	return (n < 10 ? '0' : '') + n
}

function backward() {
	document.location.href="http://127.0.0.1/Amarelo/backward.php"; 
}
function forward() {
	document.location.href="http://127.0.0.1/Amarelo/forward.php";
}

</script>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Amarelo</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>

		<!-- Header & Menu -->
		<div id="a_header-wrapper">
			<div id="a_header" class="a_container">
				<div id="a_logo">
					<div id="a_logo2">
						<h1>Amarelo</h1>
					</div>
				</div>
				<div id="a_menu">
					<ul>
						<li><a href="athlete_infos.php">Profil</a></li>
						<li class='active'><a href="activites.php">Activités</a></li>
					</ul>
				</div>
				<div id="a_menu2">
					<ul>
						<li><a href="succes.php">Succès</a></li>
						<li><a href="deconnexion.php">Déconnexion</a></li>
					</ul>
				</div>
				<div id="a_connected">
					<li><?php echo '<font color="white">'.$_SESSION['firstname']." ".$_SESSION['lastname']."</font>";?></li>
					<li><img src="images/logo_account.png" alt="profile_logo"></li>
				</div>
			</div>
		</div>
	</head>

	<body id="bodypage">
		<div id="div_tableau">
			<table id="tableau">
				<tr>
					<td>Type</td>
					<td>Date</td>
					<td>Nom</td>
					<td>Durée</td>
					<td>Distance</td>
					<td>Dénivelé</td>
				</tr>
			</table>
		</div>
		<div id="button_back">
			
		</div>
		<div id="button_for">
			
		</div>
	</body>

	<!-- Footer -->
	<!--
	<footer id="footer"> 
		<div class="inner">	

			<ul class="icons">
				<li><a href="https://twitter.com/Piresss_" class="icon round fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="https://www.facebook.com/theo.pires.5" class="icon round fa-facebook"><span class="label">Facebook</span></a></li>
				<li><a href="https://www.instagram.com/to.piress/" class="icon round fa-instagram"><span class="label">Instagram</span></a></li>
			</ul>

			<div class="copyright">
				&copy; Amarelo. Design: <a href="https://templated.co">TEMPLATED</a>. Powered by Strava.
			</div>

		</div>
	</footer>
-->

</html>