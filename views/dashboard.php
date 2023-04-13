            <!-- Message de bienvenue -->
            <h2>Bienvenue <?=$_SESSION['userName']?></h2>
            <a href="<?=$_SERVER['REQUEST_URI']?>" id="upd">Modifier votre profil</a>

            <!-- Statistiques -->
            <h3>Score : <?=$_SESSION['score']?></h3>
            <!-- Tableau de Pokémons -->
            <h4>Votre harem</h4>
            <table>
            <thead>
              <tr>
                <th>Type</th>
                <th>Nom</th>
                <th>PV</th>
                <th>PV max</th>
                <th>PC</th>
            </thead>
            <tbody>
              <form>
<?php
// on récupère les pokemons de l'utilisateur
$pokemonDAO = new PokemonDAO();
$pokeList = $pokemonDAO->readAll(8);
// on affiche leurs données dans le tableau
foreach($pokeList as $pokemon) {
  foreach($pokemon as $column => $info){
    if ($column === 'id_pokemon') {
      break;
    }
    echo "<td>$pokemon[$column]</td>";
  }
  echo "<td><input type='radio' name='selectedPokemon' id='idPoke" . $pokemon["id_pokemon"] . "'></td></tr>";
}
?>
                </form>
              </tbody>
            </table>
            <!-- Jouer -->
            <button type="submit" id="fight">Combattre</button>
        </pre>
    </div>
    <script>
      let btn = document.getElementById('fight');
      btn.addEventListener('click', () => {
        let test = document.querySelector('input[name="selectedPokemon"]:checked').id;
        console.log(test);
        // test.forEach((element) => {
        //   console.log(element.value);
        // });
        // console.log(test);
        // location.href='<?=WEBROOT?>Combat/index';
      });
    </script>
  </body>
</html>
