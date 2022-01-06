<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/CarService/src//models/DAO/dataLog.php");

try {
		$bdd = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS);
}

catch (PDOException $e) {
	echo "Erreur: ".$e->getMessage()."<br/>"; 
	die();
}

//  Récupération de l'utilisateur et de son password hashé
$pseudo = $_POST['pseudo'];
$pseudoClient = $_POST['pseudo'];

$req = $bdd->prepare("SELECT id_user, pseudo, password FROM membre WHERE pseudo = '$pseudoClient'");
$req->execute(array(
    'pseudo' => $pseudo));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);


if (!$resultat)
{

    echo 'Mauvais identifiant ou mot de passe ! <br/>';
    echo "<a href=\"index.php\">Retourner à la page de connexion</a>";
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['id_user'] = $resultat['id_user'] ;
        header("Location:espace_abonne.php?pseudo= $pseudo");
    }
    else {
        echo 'Mauvais identifiant ou mot de passe ! <br/>';
        echo "<a href=\"index.php\">Retourner à la page de connexion</a>";
    }
}
