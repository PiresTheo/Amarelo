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
						<li><a href="profil.php">Profil</a></li>
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

	<body id="bodypage">
		

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