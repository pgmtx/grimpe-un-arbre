<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Grimpe un arbre ! - Flux</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/flux.css">
  </head>
  <body>
    <?php
    if (!isset($_COOKIE['identifiant'])) {
      header('Location: ./connexion.php');
      die();
    }

    $identifiant = $_COOKIE['identifiant'];

    echo '<div id="dropdown">
      <img alt="Photo de profil" src="../static/photo_profil.png" width="32" height="32" style="vertical-align: middle">
      <button class="bouton_dropdown" onclick="changer_affichage_dropdown()">';
    echo '<span style="vertical-align: middle">';
    echo $identifiant;
    echo '</span>
      </button>
      <div id="mon_dropdown" class="contenu_dropdown">
        <a href="./infos.php">À propos</a>
        <a href="#">Options</a>
        <a href="./deconnexion.php">Déconnexion</a>
      </div>
    </div>
    <script src="../js/flux.js"></script>';
    ?>
  </body>
</html>
