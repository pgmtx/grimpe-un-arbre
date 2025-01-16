<?php
require('requetes.php');

function ajouter_compte($nom_utilisateur, $mot_de_passe) {
  $sql = "INSERT INTO comptes (identifiant, mot_de_passe) VALUES ('$nom_utilisateur', '$mot_de_passe')";
  faire_requete_sql($sql);
}

function accueillir_utilisateur() {
  if (!isset($_POST["nom_utilisateur"])) {
    throw new Exception("Impossible de valider l'inscription si vous ne venez pas de vous inscrire.");
  }

  $nom_utilisateur = $_POST["nom_utilisateur"];
  $compte = obtenir_compte_correspondant($nom_utilisateur);
  if (!is_null($compte)) {
    throw new Exception("Le pseudo '$nom_utilisateur' est déjà pris.");
  }

  $mot_de_passe = $_POST["mot_de_passe"];
  ajouter_compte($nom_utilisateur, $mot_de_passe);

  //$niveau = $_POST["selection_niveau"];

  rediriger_vers_flux($nom_utilisateur);
}

try {
  accueillir_utilisateur();
} catch (Exception $e) {
  echo "<script type=\"text/javascript\">
    function revenir_page_connexion() {
      window.location.href = \"../inscription.html\";
      alert(\"Erreur: {$e->getMessage()}\");
    };
    revenir_page_connexion();
  </script>";
}
?>
