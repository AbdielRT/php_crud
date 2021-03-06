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

        <form method="post" action="verification.php" onsubmit="compare(event)">
          <h2>Inscription</h2>
          <input
            id="pseudo"
            type="text"
            name="pseudo"
            placeholder="Entrez votre pseudo"
            required
          />
          <input
            id="email"
            type="email"
            name="email"
            placeholder="Entrez votre email"
            required
          />
          <input
            id="confirmation"
            type="email"
            name="emailconf"
            placeholder="Confirmez votre email"
            required
          />
          <div id="error">
            <p id="errormail"></p>
          </div>
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

    <script src="assets/app.js"></script>
  </body>
</html>
