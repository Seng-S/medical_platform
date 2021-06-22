<!DOCTYPE html>
<html>
<head>
	<title>MedApp Doctor Home</title>
	<script src="../javascript/jquery.min.js"></script>
	<script src="../javascript/doctorauthentication.js"></script>
	<script src="../javascript/doctorNotification.js"></script>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap.css.map">
	<link rel="stylesheet" href="../css/bootstrap.min.css.map">
</head>



<body class="bg-light">

	<header>
		<nav class="navbar navbar-expand-md navbar-dark bg-primary" style="background-color: tomato">
			<div>
				<a href="homedoctor.php" class="navbar-brand"> MedApp </a>
			</div>

			<ul class="navbar-nav">
				<li><a href="doctorschedule.php"
					class="nav-link">Schedule</a></li>
				<li><a
					href="doctorappointmentrecord.php"
					class="nav-link">Patient Records <span id="notificationCount"></span></a></li>
                <li><a 
					href="doctorsetting.php"
					class="nav-link">Setting</a></li>
				<li><a 
					href="doctorspecialization.php"
					class="nav-link">Specialization</a></li>
				<li><a 
					href="doctoraddress.php"
					class="nav-link">Address</a></li>
                <li><a href="../../routes/auth/doctorSignOut.php"
					class="nav-link">Sign Out </a></li>
			</ul>
            
		</nav>
	</header>
	<main>
		<div class="container mt-5">
			<div class="row">
				<div class="col-md-8 text-justify lead">
					<h1>Bienvenue sur MedApp !</h1>
					<br />
                Accédez à l'avis de dizaines de milliers de professionnels de santé.

                Prenez rendez vous en ligne 24h/24 et 7j/7, pour une consultation physique ou vidéo.

                Recevez des rappels automatique par notification.

                Retouvez vos rendez vous simplement et rapidement.
				</div>
				<div class="col-md-4">
					<img
						src="https://media-exp1.licdn.com/dms/image/C4D0BAQEsYl0Rv93D4w/company-logo_200_200/0/1605266093338?e=2159024400&v=beta&t=eEAU13Ttrs88bHpNxaNMYXJpVR4cL4InAJD2OCJsliE"
						class="rounded float-right" />
				</div>
				<div class="col-md-12" style="margin-top: 10em">
				
					MedApp 		|		100000 utilisateurs !		|		Plus de 80000 médecins à consulter !
				</div>
			</div>
		</div>
	</main>
</html>

