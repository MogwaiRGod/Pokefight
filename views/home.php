<!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <title>Pokéfight</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Diane">
    <!-- <link rel="stylesheet" href="style/root.css"> -->
    <link rel="stylesheet" href="style/style.css">
  </head>

  <body>
    <div id="container">
        <pre>
            <h1>Pokéfight</h1>
            <h2>Elevez et envoyez vos Pokémons à la mort gratuitement !</h2>
            <!-- Formulaire de connexion -->
            <form method="POST">
                <label for="logUsername">Nom d'utilisateur</label>
                <input name=logUsername" id="logUsername" type="text" placeholder="Nom d'utilisateur" value="XDDLPokemon">
                <label for="logPw">Mot de passe</label>
                <input name="logPw" id="logPw" type="password" value="nante$RPZ44">
                <button id="btn-co">Connexion</button>
            </form>
            <a href="Signin/index">Pas encore inscrit ?</a>
        </pre>
    </div>
    <script>
      // gestion du clic de la connexion
      let button = document.getElementById("btn-co");
      button.addEventListener("click", (event) => {
        event.preventDefault();
        location.href = "Login/"
      });
    </script>
  </body>
</html>
