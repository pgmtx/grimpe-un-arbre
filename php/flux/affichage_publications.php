<?php
function afficher_publication($publication, $i) {
  require_once('date.php');
  echo "
    <div class=\"publication\">
    <h2>{$publication['titre']}</h2>
    <p style=\"font-style: italic\">Écrit par <strong>
  ";

  $auteur = $publication['auteur'];
  if ($auteur === 'admin') {
    echo "<span style=\"color: red\">$auteur</span>";
  } else {
    echo $auteur;
  }

  $date = obtenir_date($publication['date_creation'], true);
  echo "
    </strong>
    </p>
    <p class=\"contenu\">{$publication['contenu']}</p>
    <p class=\"sous_texte\">Publié le {$date}</p>
    <div class=\"contenu_like\" align=\"right\">
      <img id=\"like$i\" style=\"vertical-align: middle\" alt=\"Photo de profil\" src=\"../../static/sans_like.png\">
      <button class=\"bouton_like\" onclick=\"changer_image_bouton('like$i')\"></button>
    </div>
  </div>
  ";
}

function afficher_publications($predicat, $message_si_vide="", $message_si_rempli="") {
  require('../requetes.php');

  $requete = faire_requete_sql("SELECT * FROM publications");
  $publications = $requete->fetchAll();

  if (count($publications) === 0) {
    echo "<p>$message_si_vide</p>";
    return;
  }

  echo "<p>$message_si_rempli</p>";

  /* On parcourt du plus récent au moins récent.
   * Sachant que plus l'id d'une publication est élevé, plus il est récent,
   * il suffit de parcourir la liste à l'envers.
   */
  $publications_ordonnees = array_reverse($publications);
  $publications_filtrees = array_filter($publications_ordonnees, $predicat);
  foreach (array_values($publications_filtrees) as $i => $publication) {
    afficher_publication($publication, $i);
  }
}
?>
