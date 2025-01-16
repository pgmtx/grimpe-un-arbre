<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Grimpe un arbre ! - Informations</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
  </head>
  <body>
  <img alt="Votre photo de profil" src="../../static/photo_profil.png"><br>
  <?php
  if (!isset($_COOKIE['identifiant'])) {
    header('Location: ../connexion.php');
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

  function obtenir_mois_francais($mois) {
    $mois_anglais = array(
      "January", "February", "March", "April", "May", "June", "July",
      "August", "September", "October", "November", "Décember"
    );
    $mois_francais = array(
      "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet",
      "Août", "Septembre", "Octobre", "Novembre", "Décembre"
    );
    assert(count($mois_anglais) === count($mois_francais));

    $indice = array_search($mois, $mois_anglais);
    return $mois_francais[$indice];
  }

  $date_brute = substr($compte['date_creation'], 0, strlen('YYYY-MM-DD'));
  $date_creation = DateTime::createFromFormat('Y-m-d', $date_brute);
  $sortie = explode(" ", $date_creation->format('j F Y')); // jour Mois année
  $mois = obtenir_mois_francais($sortie[1]);
  $date = "{$sortie[0]} $mois {$sortie[2]}";
  echo "<p>Compte créé le : $date</p>"
  ?>
  </body>
</html>
