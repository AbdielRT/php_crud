<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/CarService/src//models/DAO/dataLog.php");

try {
		$bdd = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS);
}

catch (PDOException $e) {
	echo "Erreur: ".$e->getMessage()."<br/>"; 
	die();
}

$regex = "((?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*\W).{8,})";

if (isset($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['pseudo']) && !empty($_POST['password'])) {
	if (preg_match($regex, $_POST['password'])) {
		$pseudo = strtolower(trim($_POST['pseudo']));
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$email = addslashes($_POST['email']);

// Insertion
		$req = $bdd->prepare('INSERT INTO membre(pseudo, password, email) VALUES(:pseudo, :password, :email)');
		$req->execute(array(
		   'pseudo' => $pseudo,
		   'password' => $password,
		   'email' => $email,
		));
			
		header("Location:dashboard.php?pseudo=$pseudo");
	}else{
		echo ("le mot de passe doit contenir au minimum une majuscule, un caractère spécial, un digit, une minuscule et au moins 8 caractères <br/> <a href='inscription.html'>Revenez en arrière</a>");
	}

} else {
			header('Location:index.php');
		}

