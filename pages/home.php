<!DOCTYPE html>
<html>
<head>
<title>MedApp</title>
<script src="javascript/jquery.min.js"></script>
</head>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap.css.map">
<link rel="stylesheet" href="css/bootstrap.min.css.map">

<body class="bg-light">

	<header>
		<nav class="navbar navbar-expand-md navbar-dark bg-primary"
			style="background-color: tomato">
			<div>
				<a href="#" class="navbar-brand"> MedApp </a>
			</div>

			<ul class="navbar-nav">
				<li><a href="client/registrationclient.php"
					class="nav-link">Client Register</a></li>
				<li><a href="client/loginclient.php"
					class="nav-link">Client Login</a></li>
				<li><a
					href="doctor/registrationdoctor.php"
					class="nav-link">Doctor Register</a></li>
                <li><a href="doctor/logindoctor.php"
					class="nav-link">Doctor Login</a></li>
			</ul>

            <form class="d-flex" action="search.php"  method="get">
                    <input class="form-control me-2" name="criteria" type="search" placeholder="Search" aria-label="Search" required>
                    <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

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
				
					MedApp		|		100000 utilisateurs !		|		Plus de 80000 médecins à consulter !
				</div>
			</div>
		</div>
	</main>

</html>

