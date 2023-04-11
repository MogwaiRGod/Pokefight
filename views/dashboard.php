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
                <tr>
              <thead>
              <tbody>
              <?php 
              // foreach()
              ?>
              </tbody>
            </table>

            <!-- Jouer -->
            <button id="fight">Combattre</button>
        </pre>
    </div>
    <script>
      let btn = document.getElementById('fight');
      btn.addEventListener('click', () => {
        location.href='Combat/index';
      });
    </script>
  </body>
</html>
