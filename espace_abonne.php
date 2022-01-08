<?php 
session_start();
if ($_SESSION['pseudo'] == trim($_GET['pseudo']))  {
?>
<!DOCTYPE html>
	<html lang="fr">
		<head>
			<meta charset="utf-8"/>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link href='https://fonts.googleapis.com/css?family=Maitree' rel='stylesheet'>
			<link rel="stylesheet" href="assets/styles/style2.css" />
			<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap.min.css">
			<title>Espace Abonné</title>
			<script src="assets/app.js" defer></script>
		</head>

		<body>
			<header>
				<div class="button">
					<a href="logout.php">Déconnexion</a>
				</div>
			</header>

			<!-- <h2>Bienvenue dans votre espace abonné !</h2> -->

			<div id="bienvenue">
				<h2>Bienvenue, <span> <?php echo $_GET['pseudo']; ?> </span></h2>
				<!-- <p>N'oublies pas de te déconnecter :)</p> -->
			</div>


			<div class="img">
				<img src="public/images/utilisateur.png" alt="user image">
			</div>

			<div class="alert alert-dismissible alert-success d-none text-center" id="messageYes">
				<p>Voiture bien ajoutée</p>
			</div>


			<div class="alert alert-dismissible alert-danger d-none text-center" id="messageNo">
				<p>Voiture bien supprimée</p>
			</div>

			<div class="alert alert-dismissible alert-success d-none text-center" id="confirmUpdate">
				<p>Voiture bien modifiée</p>
			</div>

			<form method="POST">
				<div class="row justify-content-center">
					<div class="col-sm-8 col-lg-4 text-center">
						<div class="form-group">
		  					<label class="col-form-label mt-4" for="inputDefault">Plaque Immatriculation</label>
		 					<input type="text" class="form-control text-center" placeholder="AA-123-AA" id="plaque" name="plaque" required>
							 <p id="errorPlaque"></p>
						</div>
						<div class="form-group">
		  					<label class="col-form-label mt-4" for="inputDefault">Couleur</label>
		 					<input type="text" class="form-control text-center" placeholder="Insérez la couleur" id="couleur" name="couleur" required>
						</div>
						 <!-- <div class="form-group"> -->
		  					 <!-- <label class="col-form-label mt-4" for="inputDefault">Marque</label> -->
		 					 <!-- <input type="text" class="form-control text-center" placeholder="Insérez la marque" id="marque" name="marque"> -->
							 <div class="form-group">
                               <label for="Choix" class="form-label mt-4">Marque</label>
                               <select class="form-select" id="choix" name="marque" required>
                                <option>--Choisir une option--</option>
								<option>Peugeot</option>
        					    <option>Renault</option>
      						    <option>Citroën</option>
       						    <option>Opel</option>
                                <option>Volkswagen</option>
								<option>Toyota</option>
								<option>Fiat</option>
								<option>BMW</option>
								<option>Audi</option>
								<option>Mercedes</option>
                               </select>
							   <p id="errorChoix"></p>
                            </div>
						<!-- </div> -->
						<div class="form-group">
		  					<label class="col-form-label mt-4" for="inputDefault">Modèle</label>
		 					<input type="text" class="form-control text-center" placeholder="Insérez le modèle" id="modele" name="modele" required>
						</div>

						<div class="gap-2" id="buttons">
							<button class="btn btn-lg btn-outline-primary" id="btn1" type="submit">Ajouter</button>
							<button class="btn btn-lg btn-outline-primary disabled" id="btn2" type="submit" >Modifier</button>
						</div>
					</div>
					<div class="col-sm-8 col-lg-4 text-center">
					<table class="table table-hover" id="tableauCars">
					</table>
					<span class="d-none" id="pasVoitures">Commencez à ajouter vos voitures</span>

				</div>
			</form>

			
		</body>
	</html>

	<?php
}else{
	echo "Page not found !";
	session_destroy();

}