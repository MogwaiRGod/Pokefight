<!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <title>Pokéfight</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Diane">
    <!-- <link rel="stylesheet" href="style/root.css"> -->
    <link rel="stylesheet" href="<?=WEBROOT?>views/style/style.css">
  </head>

  <body>
    <div id="container">
<?php
// si aucun utilisateur n'est loggé ; on affiche la page d'accueil
if (empty($_SESSION)) {
  include 'accueil.php';
}
else {
  // si un utilisateur est loggé : on affiche le dashboard
  include 'dashboard.php';
}
?>

