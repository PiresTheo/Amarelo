<?php 
session_start();
//Numéro de la page pour la page activités remis à la valeur par défaut
$_SESSION['numpage'] = 1;

//data from cookies to $_SESSION
$_SESSION['photo'] = $_COOKIE["photo"];
$_SESSION['city'] = $_COOKIE["city"];
$_SESSION['state'] = $_COOKIE["state"];
$_SESSION['country'] = $_COOKIE["country"];
$_SESSION['sex'] = $_COOKIE["sex"];
$_SESSION['club_name'] = $_COOKIE["club_name"];
$_SESSION['club_city'] = $_COOKIE["club_city"];
$_SESSION['club_state'] = $_COOKIE["club_state"];
$_SESSION['club_country'] = $_COOKIE["club_country"];
$_SESSION['club_sport'] = $_COOKIE["club_sport"];
$_SESSION['club_photo'] = $_COOKIE["club_photo"];
$_SESSION['success_points'] = $_COOKIE["success_points"];
$_SESSION['nb_activites'] = $_COOKIE["nb_activites"];

$_SESSION['rides_count'] = $_COOKIE["rides_count"];
$_SESSION['rides_distance'] = $_COOKIE["rides_distance"];
$_SESSION['rides_movingtime'] = $_COOKIE["rides_movingtime"];
$_SESSION['rides_elevation'] = $_COOKIE["rides_elevation"];
$_SESSION['runs_count'] = $_COOKIE["runs_count"];
$_SESSION['runs_distance'] = $_COOKIE["runs_distance"];
$_SESSION['runs_movingtime'] = $_COOKIE["runs_movingtime"];
$_SESSION['runs_elevation'] = $_COOKIE["runs_elevation"];
$_SESSION['swims_count'] = $_COOKIE["swims_count"];
$_SESSION['swims_distance'] = $_COOKIE["swims_distance"];
$_SESSION['swims_movingtime'] = $_COOKIE["swims_movingtime"];
?>

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
						<li class='active'><a href="athlete_infos.php">Profil</a></li>
						<li><a href="activites.php">Activités</a></li>
					</ul>
				</div>
				<div id="a_menu2">
					<ul>
						<li><a href="succes.php">Succès</a></li>
						<li><a href="deconnexion.php">Déconnexion</a></li>
					</ul>
				</div>
				<div id="a_connected">
					<li><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']."</font>";?></li>
					<li><img src="images/logo_account.png" alt="profile_logo"></li>
				</div>
			</div>
		</div>
	</head>

	<body id="bodypage">

		<div id="profil_1" class="profil_class">
			<article class="box">
				<div id="profil_1_img">
					<img src=<?php echo $_SESSION['photo']?> alt="profile_logo">
				</div>
				<div id="profil_1_infos">
					<h2><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']?></h2>
					<p><?php echo $_SESSION['country'].", ".$_SESSION['state'].", ".$_SESSION['city']?></p>
					<p><?php echo $_SESSION['sex']?></p>
				</div>			
			</article>
		</div>

		<div id="profil_3" class="profil_class">
			<article class="box">
				<div id="profil_3_score">
					<p>Score</p>
					<h2><?php echo $_SESSION['success_points']?></h2>
				</div>			
			</article>
		</div>

		<div id="profil_2" class="profil_class">
			<article class="box">
				<div id="profil_2_img">
					<img src=<?php echo $_SESSION['club_photo']?> alt="profile_logo">
				</div>
				<div id="profil_2_infos">
					<h2><?php echo $_SESSION['club_name']?></h2>
					<p><?php echo $_SESSION['club_country'].", ".$_SESSION['club_state'].", ".$_SESSION['club_city']?></p>
					<p><?php echo $_SESSION['club_sport']?></p>
				</div>			
			</article>
		</div>
			
		<div id="profil_4">
			<article class="box">
				<table id="profil_4_table">
					<tr>
						<th><h2>Stats</h2></th>
						<th><img src="images/swim.png" alt="logo_swim"></th>
						<th><img src="images/run.png" alt="logo_run"></th>
						<th><img src="images/bike.png" alt="logo_bike"></th>
					</tr>
					<tr>
						<td>Nombre d'activités</td>
						<td style="text-align:center;"><?php echo $_SESSION['swims_count']?></td>
						<td style="text-align:center;"><?php echo $_SESSION['runs_count']?></td>
						<td style="text-align:center;"><?php echo $_SESSION['rides_count']?></td>
					</tr>
					<tr>
						<td>Distance totale</td>
						<td style="text-align:center;"><?php echo $_SESSION['swims_distance']?></td>
						<td style="text-align:center;"><?php echo $_SESSION['runs_distance']?></td>
						<td style="text-align:center;"><?php echo $_SESSION['rides_distance']?></td>
					</tr>
					<tr>
						<td>Durée totale</td>
						<td style="text-align:center;"><?php echo $_SESSION['swims_movingtime']?></td>
						<td style="text-align:center;"><?php echo $_SESSION['runs_movingtime']?></td>
						<td style="text-align:center;"><?php echo $_SESSION['rides_movingtime']?></td>
					</tr>
					<tr>
						<td>Dénivelé totale</td>
						<td style="text-align:center;">-</td>
						<td style="text-align:center;"><?php echo $_SESSION['runs_elevation']?></td>
						<td style="text-align:center;"><?php echo $_SESSION['rides_elevation']?></td>
					</tr>
				</table>
			</article>
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

<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</html>