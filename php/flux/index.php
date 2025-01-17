<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Grimpe un arbre ! - Flux</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/flux.css">
  </head>
  <body>
    <?php
    if (!isset($_COOKIE['identifiant'])) {
      header('Location: ../connexion.php');
      die();
    }

    $identifiant = $_COOKIE['identifiant'];

    echo '<div id="dropdown">';
    //<img alt="Photo de profil" src="../../static/photo_profil.png" width="32" height="32" style="vertical-align: middle">
    echo '<button class="bouton_dropdown" onclick="changer_affichage_dropdown()">
    <span style="font-weight: bold">';
    echo $identifiant;
    echo '</span>
      </button>
      <div id="mon_dropdown" class="contenu_dropdown">
        <a href="./infos.php">À propos</a>
        <a href="./mes_publications.php">Mes publications</a>
        <a href="./ajouter_un_arbre.php">Nouvelle publication</a>
        <a href="../deconnexion.php" style="color: red">Déconnexion</a>
      </div>
    </div>
    <script src="../../js/flux.js"></script>
    ';

    require('affichage_publications.php');
    echo '<h1>Publications récentes</h1>';
    afficher_publications(
      function($p) use ($identifiant) {
        return $p['auteur'] !== $identifiant;
      },
      "C'est un peu vide ici...",
      'Vos publications ne seront pas affichées ici. Pour les voir, rendez-vous sur "Mes publications"'
    );
    ?>
  </body>
</html>
