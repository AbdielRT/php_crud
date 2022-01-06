<?php        
session_start();  
//session_destroy sert à detruire la session  
session_destroy();  
// echo" Vous êtes  déconnecté";    
?> 

<!DOCTYPE html>
	<html lang="fr">
		<head>
			<meta charset="utf-8"/>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link href='https://fonts.googleapis.com/css?family=Maitree' rel='stylesheet'>
			<link rel="stylesheet" href="assets/styles/style2.css" />
			<title>Déconnexion</title>
		</head>

		<body>
			<h2>Vous êtes déconnecté(e)</h2>

			<div class="img">
				<img src="public/images/deconnexion.jpeg" alt="user image">
			</div>

			<div id="deconnexion">
				<p>Au revoir et à bientôt</p>
				<div class="button" id="retourAccueil">
					<a href="index.php">Retour à l'accueil</a>
				</div>
			</div>

			

		</body>
	</html>