<!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <title>Pokéfight — Inscription</title>
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
            <h3>Inscription</h3>
            <!-- Formulaire d'inscription -->
            <form method="POST" action="addJoueur">
                <label for="iptUsername">Nom d'utilisateur</label>
                <input name="iptUsername" id="iptUsername" type="text" placeholder="Nom d'utilisateur" value="XDDLPokemon">
                <label for="iptMail">Adresse mél</label>
                <input name="iptMail" id="iptMail" type="mail" placeholder="Votre mél" value="xavier@mel.fr">
                <label for="iptPw">Mot de passe</label>
                <input name="iptPw" id="iptPw" type="password" value="nante$RPZ44">
                <button id="btn-signin">Inscription</button>
            </form>
        </pre>
    </div>
  </body>
</html>
