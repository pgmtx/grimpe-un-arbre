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

    function afficher_publication($indice, $publication) {
      require_once('date.php');
      echo "
      <div class=\"publication\">
        <h2>{$publication['titre']}</h2>
        <p>Écrit par ";

      $auteur = $publication['auteur'];
      if ($auteur === 'admin') {
        echo "<span style=\"color: red\">$auteur</span>";
      } else {
        echo $auteur;
      }

      $date = obtenir_date($publication['date_creation'], true);
      echo "
        </p>
        <p>{$publication['contenu']}</p>
        <p class=\"sous_texte\">Publié le {$date}</p>
      </div>";
    }

    require('../requetes.php');
    $requete = faire_requete_sql("SELECT * FROM publications WHERE auteur = '$identifiant'");
    $publications = $requete->fetchAll();
    echo "<h1>Mes publications</h1>";

    if (count($publications) === 0) {
      echo "<p>Vous n'avez rien publié pour le moment</p>";
    }

    /* On parcourt du plus récent au moins récent.
     * Sachant que plus l'id d'une publication est élevé, plus il est récent,
     * il suffit de parcourir la liste à l'envers.
     */
    $publications_ordonnees = array_reverse($publications);
    foreach (array_values($publications_ordonnees) as $i => $publication) {
      afficher_publication($i, $publication);
    }
    ?>
  </body>
</html>
