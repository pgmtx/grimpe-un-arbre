<?php
function executerAvecErreurs($fonction) {
  try {
    $fonction();
  } catch (Exception $e) {
    echo "<script type=\"text/javascript\">
      function revenir_page_connexion() {
      window.location.href = \"./connexion.php\";
      alert(\"Erreur: {$e->getMessage()}\");
      };
      revenir_page_connexion();
    </script>";
  }
}
?>

