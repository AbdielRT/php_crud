<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css?family=Maitree"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/styles/style.css" />
    <title>Login Page</title>
  </head>

  <body>
    <section>
      <div id="login">
        <div class="imageform">
          <img src="public/images/car.jpg" alt="image de login" />
        </div>

        <form method="post" action="clientbd.php">
          <h2>Connexion</h2>
          <input
            id="pseudo"
            type="text"
            name="pseudo"
            placeholder="Entrez votre pseudo"
            required
          />
          <input
            id="pass"
            type="password"
            name="password"
            placeholder="Entrez votre mot de passe"
            required
          />
          <input id="button" type="submit" name="submit" value="Entrer" />
        </form>
      </div>
    </section>

    <div id="inscription">
      <p>
        Si vous n'avez pas encore de compte
        <span><a href="inscription.php">cliquez ici</a></span>
      </p>
    </div>
  </body>
</html>
