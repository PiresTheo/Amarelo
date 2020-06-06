<?php 
session_start();
//Numéro de la page pour la page activités remis à la valeur par défaut
$_SESSION['numpage'] = 1;
?>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/succes.js"></script>
<script>
	function clearTables() {
		var table_distance = document.getElementById("table_succes_distance");
		var table_duree = document.getElementById("table_succes_duree");
		var rowCount = table_distance.rows.length;
		var rowCount2 = table_duree.rows.length;
		for (var i=1; i<rowCount; i++) {
			table_distance.deleteRow(1);
		}
		for (var i=1; i<rowCount2; i++) {
			table_duree.deleteRow(1);
		}
	}
	function myclick(numero) {
		var table_distance = document.getElementById("table_succes_distance");
		var table_duree = document.getElementById("table_succes_duree");
		if (numero==1) {
			clearTables();
			for (let i=1; i<=tab_succes_swim_distance.length; i++) {
				var row = table_distance.insertRow(i);
				var cell1 = row.insertCell(0);
				cell1.innerHTML = tab_succes_swim_distance[i-1].nom;
				var cell2 = row.insertCell(1);
				cell2.innerHTML = tab_succes_swim_distance[i-1].points + "\ud83c\udfc6";
				var cell3 = row.insertCell(2);
				if (i<=<?php echo $_SESSION["swim_dist"]?>) {
					cell3.innerHTML = "RÉUSSI";
				}else {
					cell3.innerHTML = "";
				}
			}
			for (let i=1; i<=tab_succes_swim_duree.length; i++) {
				var row = table_duree.insertRow(i);
				var cell1 = row.insertCell(0);
				cell1.innerHTML = tab_succes_swim_duree[i-1].nom;
				var cell2 = row.insertCell(1);
				cell2.innerHTML = tab_succes_swim_duree[i-1].points + "\ud83c\udfc6";
				var cell3 = row.insertCell(2);
				if (i<=<?php echo $_SESSION["swim_duree"]?>) {
					cell3.innerHTML = "RÉUSSI";
				}else {
					cell3.innerHTML = "";
				}
			}
		} else if (numero==2) {
			clearTables();
			for (let i=1; i<=tab_succes_bike_distance.length; i++) {
				var row = table_distance.insertRow(i);
				var cell1 = row.insertCell(0);
				cell1.innerHTML = tab_succes_bike_distance[i-1].nom;
				var cell2 = row.insertCell(1);
				cell2.innerHTML = tab_succes_bike_distance[i-1].points + "\ud83c\udfc6";
				var cell3 = row.insertCell(2);
				if (i<=<?php echo $_SESSION["bike_dist"]?>) {
					cell3.innerHTML = "RÉUSSI";
				}else {
					cell3.innerHTML = "";
				}
			}
			for (let i=1; i<=tab_succes_bike_duree.length; i++) {
				var row = table_duree.insertRow(i);
				var cell1 = row.insertCell(0);
				cell1.innerHTML = tab_succes_bike_duree[i-1].nom;
				var cell2 = row.insertCell(1);
				cell2.innerHTML = tab_succes_bike_duree[i-1].points + "\ud83c\udfc6";
				var cell3 = row.insertCell(2);
				if (i<=<?php echo $_SESSION["bike_duree"]?>) {
					cell3.innerHTML = "RÉUSSI";
				}else {
					cell3.innerHTML = "";
				}
			}
		} else {
			clearTables();
			for (let i=1; i<=tab_succes_run_distance.length; i++) {
				var row = table_distance.insertRow(i);
				var cell1 = row.insertCell(0);
				cell1.innerHTML = tab_succes_run_distance[i-1].nom;
				var cell2 = row.insertCell(1);
				cell2.innerHTML = tab_succes_run_distance[i-1].points + "\ud83c\udfc6";
				var cell3 = row.insertCell(2);
				if (i<=<?php echo $_SESSION["run_dist"]?>) {
					cell3.innerHTML = "RÉUSSI";
				}else {
					cell3.innerHTML = "";
				}
			}
			for (let i=1; i<=tab_succes_run_duree.length; i++) {
				var row = table_duree.insertRow(i);
				var cell1 = row.insertCell(0);
				cell1.innerHTML = tab_succes_run_duree[i-1].nom;
				var cell2 = row.insertCell(1);
				cell2.innerHTML = tab_succes_run_duree[i-1].points + "\ud83c\udfc6";
				var cell3 = row.insertCell(2);
				if (i<=<?php echo $_SESSION["run_duree"]?>) {
					cell3.innerHTML = "RÉUSSI";
				}else {
					cell3.innerHTML = "";
				}
			}
		}
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
						<li><a href="activites.php">Activités</a></li>
					</ul>
				</div>
				<div id="a_menu2">
					<ul>
						<li class='active'><a href="succes.php">Succès</a></li>
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

	<body id="bodypage2">
		<div id="buttons_succes">
			<button onclick="myclick(1)" name="swim_button">Swim</button>
			<button onclick="myclick(2)" name="bike_button">Bike</button>
			<button onclick="myclick(3)" name="run_button">Run</button>
		</div>
		<div id=div_table_succes_distance>
			<table id="table_succes_distance">
				<tr>
					<th colspan="3" style="text-align:center;"><h3>Distance</h3></th>
				</tr>
			</table>
		</div>
		<div id=div_table_succes_duree>
			<table id="table_succes_duree">
				<tr>
					<th colspan="3" style="text-align:center;"><h3>Durée</h3></th>
				</tr>
			</table>
		</div>
		<script> myclick(1)</script>
	</body>

</html>