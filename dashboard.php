<!DOCTYPE html>
	<html lang="fr">
		<head>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link href='https://fonts.googleapis.com/css?family=Maitree' rel='stylesheet'>
			<link rel="stylesheet" href="assets/styles/style2.css" />
			<title>Espace Utilisateur</title>
		</head>

		<body>
			<header>
				
			</header>

			<h2>Bienvenue parmis nous !</h2>

			<div class="img">
				<img src="public/images/utilisateur.png" alt="user image">
			</div>

			<div id="bienvenue">
				<p>Félicitations <span><?php echo $_GET['pseudo']; ?> </span>,
				votre inscription est bien réussie.</p>
				<p>Connectez-vous pour accéder à votre espace utilisateur :</p>

				<div class="button">
					<a href="index.html">Connexion</a>
				</div>
			</div>

		</body>
	</html>