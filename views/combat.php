<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Pokéfight!!!</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Diane">
    <!-- <link rel="stylesheet" href="style/root.css"> -->
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div id="container">
<?php
// var_dump($_SESSION);
// si aucun utilisateur n'est loggé ; on affiche une erreur
if (empty($_SESSION)) {
  echo "GET THE FUCK OUTTA HERE";
}
else {
  // si un utilisateur est loggé : on affiche le combat
  // include 'dashboard.php';
    echo "COMBAT";
}
?>
    </div>
</body>
</html>