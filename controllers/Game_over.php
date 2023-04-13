<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Pokéfight — Partie terminée</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Diane">
    <!-- <link rel="stylesheet" href="style/root.css"> -->
    <link rel="stylesheet" href="<?=WEBROOT?>views/style/style.css">
</head>

<body>
    <div id="container">
        <!-- Afficher le résultat final -->

        <div>
            <button id="btn-new-cbt">Nouveau combat</button>
            <button id="retour">Retour</button>
        </div>
    </div>
    <script>
        /* Nouveau combat */
        let newCombat = document.getElementById("btn-new-cbt");
        newCombat.addEventListener('click', () => {
            // rafraîchit la page
            location.href='<?=WEBROOT?>Combat/index';
      });

        /* Retour */
        let retour = document.getElementById("retour");
        retour.addEventListener('click', () => {
            // rafraîchit la page
            location.href='<?=WEBROOT?>';
      });
    </script> 
</body>
</html>


