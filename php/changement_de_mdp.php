<?php 

function verifier_validite_connexion() {
  require('requetes.php');

 if (!isset($_COOKIE['identifiant'])) {
      header('Location: ../connexion.php');
    }
  
  $nom_utilisateur = $_COOKIE['identifiant'];
  $compte= obtenir_compte_correspondant ($nom_utilisateur)
  $mot_de_passe = $compte['mot_de_passe'];
  $nouveau_mot_de_passe = $_POST["mot_de_passe"];
  
  if ($mot_de_passe == $nouveau_mot_de_passe) {
	throw new Exception("Le nouveau mot de passe est identique au précédent");
  }
  else {
	$mot_de_passe = $ancien_mot_de_passe;
}


?>