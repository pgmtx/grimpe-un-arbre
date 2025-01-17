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

    echo '<div id="dropdown">
      <img alt="Photo de profil" src="../../static/photo_profil.png" width="32" height="32" style="vertical-align: middle">
      <button class="bouton_dropdown" onclick="changer_affichage_dropdown()">';
    echo '<span style="vertical-align: middle">';
    echo $identifiant;
    echo '</span>
      </button>
      <div id="mon_dropdown" class="contenu_dropdown">
        <a href="./infos.php">À propos</a>
        <a href="../deconnexion.php">Déconnexion</a>
      </div>
    </div>
    <script src="../../js/flux.js"></script>';

    function afficher_publication($indice, $publication) {
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

      echo "
        </p>
        <p>{$publication['contenu']}</p>
        <p class=\"sous_texte\">Publié le {$publication['date_creation']}</p>
      </div>";
    }

    require('../requetes.php');
    $requete = faire_requete_sql("SELECT * FROM publications");
    $publications = $requete->fetchAll();

    if (count($publications) === 0) {
      echo "<p>C'est un peu vide ici...</p>";
    } else {
      echo "<h1>Publications récentes</h1>";
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
