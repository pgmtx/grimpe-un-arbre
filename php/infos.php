<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Grimpe un arbre ! - Informations</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
  <img alt="Votre photo de profil" src="../static/photo_profil.png"><br>
  <?php
  if (!isset($_COOKIE['identifiant'])) {
    header('Location: ./connexion.php');
    die();
  }

  require('validation_connexion.php');

  $nom_utilisateur = $_COOKIE['identifiant'];
  $compte = obtenir_compte_correspondant($nom_utilisateur);

  echo "
    <h1>{$compte['identifiant']}</h1>
    <p>Niveau : {$compte['niveau']}</p>
    <p>Arbres grimpés : {$compte['arbres_grimpes']}</p>
  ";
  ?>
  </body>
</html>
