<!--
affichage_erreur.php

Ce module est utilisé notamment pour les pages vérifiant les informations
entrées par l'utilisateur. Il permet de revenir en arrière en affichant une
alerte en JavaScript, car ce n'est pas possible avec du PHP pur.
-->

<?php
function executerAvecErreurs($fonction, $lien_redirection='./index.php') {
  try {
    $fonction();
  } catch (Exception $e) {
    echo "<script type=\"text/javascript\">
      function revenir_page_connexion() {
      window.location.href = \"$lien_redirection\";
      alert(\"Erreur: {$e->getMessage()}\");
      };
      revenir_page_connexion();
    </script>";
  }
}
?>

