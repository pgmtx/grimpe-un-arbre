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

