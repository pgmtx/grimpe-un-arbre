<!--
reinitialiser_mdp.php

Cette page s'exécute lorsque l'on tente de réinitialiser un mot de passe,
en vérifiant si l'utilisateur n'a pas fait d'erreur.
-->

<?php 
function valider_reinitialisation() {
  require('requetes.php');

  if (isset($_COOKIE['identifiant'])) {
    header('Location: ./index.php');
    die();
  }

  $nom_utilisateur = $_POST['nom_utilisateur'];
  $compte = obtenir_compte_correspondant($nom_utilisateur);
  if (is_null($compte)) {
    throw new Exception("Le nom d'utilisateur '$nom_utilisateur' n'existe pas.");
  }

  $mot_de_passe = $compte['mot_de_passe'];
  $nouveau_mot_de_passe = $_POST["mot_de_passe"];

  if ($mot_de_passe == $nouveau_mot_de_passe) {
    throw new Exception("Le nouveau mot de passe est identique au précédent");
  }

  $sql = "UPDATE comptes SET mot_de_passe = :nouveau_mot_de_passe WHERE comptes.identifiant = :nom_utilisateur";
  faire_requete_sql($sql, ':nouveau_mot_de_passe', $nouveau_mot_de_passe, ':nom_utilisateur', $nom_utilisateur);

  header('Location: ./index.php');
  die();
}

require('affichage_erreur.php');
executerAvecErreurs(function() { valider_reinitialisation(); }, '../reinitialiser_mdp.html');
?>
