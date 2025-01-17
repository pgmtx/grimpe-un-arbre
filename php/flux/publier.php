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
    $contenu = "Je grimpai un $espece de {$hauteur}m. Ce fut $difficulte, mais franchement très sympa.";
    $sql = "INSERT INTO publications (titre, auteur, contenu) VALUES ('$titre', '$auteur', '$contenu')";
    $requete = faire_requete_sql($sql);

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
