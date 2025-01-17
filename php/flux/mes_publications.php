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
    echo "<h1>Mes publications</h1>";

    require('affichage_publications.php');
    afficher_publications(
      function($p) use ($identifiant) {
        return $p['auteur'] === $identifiant;
      },
      "Vous n'avez rien publié pour le moment."
    );
    ?>
  </body>
</html>
