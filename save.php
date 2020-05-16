
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
					<div id="profil_3_img">
						<img src="images/logo_trophee.png" alt="profile_logo">
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
    
            

            #profil_1 {
			float: left;
			margin-left: 3%;
			margin-top: 1%;
			width: 37%;
		}

		#profil_2 {
			float: left;
			margin-left: 2%;
			margin-top: 1%;
			width: 37%;
		}

		#profil_3 {
			float: left;
			margin-top: 1%;
			margin-left: 2%;
			width: 16%;
		}

		#profil_1 .box, #profil_2 .box{
			padding: 2em;
		}

		#profil_3 .box{
			padding: 0.5em;
		}

		
		#profil_1_img, #profil_2_img {
			width: 20%;
			display: block;
			float:left;
		}


		#profil_1 img, #profil_2 img, #profil_3 img  {
			border-radius: 50%;
			width: 100%;
			height: 100%;
		}

		#profil_1_infos, #profil_2_infos {
			display: block;
			float: left;
			margin-left: 10%;
		}

		#profil_1_infos h2, p, #profil_2_infos h2, h3, p{
			margin-bottom: 0em;
		}