<!--
infos.php

Page montrant des informations sur l'utilisateur.
-->

<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Grimpe un arbre ! - Informations</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
  </head>
  <body>
  <img alt="Votre photo de profil" src="../../static/sans_like.png"><br>
  <?php
  if (!isset($_COOKIE['identifiant'])) {
    header('Location: ../index.php');
    die();
  }

  require('../requetes.php');

  $nom_utilisateur = $_COOKIE['identifiant'];
  $compte = obtenir_compte_correspondant($nom_utilisateur);

  if ($nom_utilisateur === 'admin') {
    echo "<h1 style=\"color: red\">{$nom_utilisateur} (dev)</h1>";
  } else {
    echo "<h1>{$nom_utilisateur}</h1>";
  }
  echo "
    <p>Niveau : {$compte['niveau']}</p>
    <p>Arbres grimpés : {$compte['arbres_grimpes']}</p>
  ";

  require('date.php');
  $date = obtenir_date($compte['date_creation']);
  echo "<p>Compte créé le : $date</p>";
  ?>
  </body>
</html>
