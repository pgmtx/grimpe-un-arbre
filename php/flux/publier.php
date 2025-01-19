<!--
publier.php

Cette page s'exécute une fois que l'on crée une nouvelle publication, et
affiche le résultat.
-->

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
    if (!isset($_POST['espece'])) {
      header('Location: ../index.php');
      die();
    }

    require('../requetes.php');

    $auteur = $_COOKIE['identifiant'];
    $titre = $_POST['titre'];
    $hauteur = $_POST['hauteur'];
    $espece = strtolower($_POST['espece']);
    $difficulte = strtolower($_POST['difficulte']);
    $contenu = "J'ai grimpé un $espece de {$hauteur}m de haut. C'était $difficulte, mais franchement très sympa.";

    $sql = "INSERT INTO publications (titre, auteur, contenu) VALUES (:titre, :auteur, :contenu)";
    faire_requete_sql($sql, ':titre', $titre, ':auteur', $auteur, ':contenu', $contenu);

    echo "<h1></h1>";
    echo "
    <div class=\"publication\">
      <h2>$titre</h2>
      <p style=\"font-style: italic\">Écrit par <strong>";

    if ($auteur === 'admin') {
      echo "<span style=\"color: red\">$auteur</span>";
    } else {
      echo $auteur;
    }

    //$date = obtenir_date($publication['date_creation'], true);
    echo "
        </strong>
      </p>
      <p id=\"contenu\">$contenu</p>
    </div>";
    //<p class=\"sous_texte\">Publié le {$date}</p>
    ?>
  </body>
</html>
