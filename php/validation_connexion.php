<?php
function verifier_validite_connexion() {
  require('requetes.php');

  // A lieu si on essaye d'accéder à cette page sans être connecté
  if (!isset($_POST["nom_utilisateur"])) {
    throw new Exception("Impossible de valider la connexion si vous n'êtes pas connecté.");
  }

  $nom_utilisateur = $_POST["nom_utilisateur"];
  $compte = obtenir_compte_correspondant($nom_utilisateur);
  if (is_null($compte)) {
    throw new Exception("L'utilisateur '$nom_utilisateur' n'existe pas.");
  }

  $mot_de_passe = $_POST["mot_de_passe"];
  $mot_de_passe_attendu = $compte['mot_de_passe'];

  if ($mot_de_passe !== $mot_de_passe_attendu) {
    throw new Exception("Mauvais mot de passe.");
  }

  rediriger_vers_flux($nom_utilisateur);
}

/* Ne s'exécute que si le fichier lui-même est exécuté.
 * Cela permet d'éviter des appels de fonctions non souhaités lors d'un `require`.
*/
if (!debug_backtrace()) {
  require('affichage_erreur.php');
  executerAvecErreurs(function() { verifier_validite_connexion(); });
}
?>
