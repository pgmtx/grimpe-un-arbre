<?php 
require('requetes.php');

if (isset($_COOKIE['identifiant'])) {
  header('Location: ./connexion.php');
  die();
}

$nom_utilisateur = $_POST['nom_utilisateur'];
$compte = obtenir_compte_correspondant($nom_utilisateur);
$mot_de_passe = $compte['mot_de_passe'];
$nouveau_mot_de_passe = $_POST["mot_de_passe"];

if ($mot_de_passe == $nouveau_mot_de_passe) {
  throw new Exception("Le nouveau mot de passe est identique au précédent");
}

$sql = "UPDATE comptes SET mot_de_passe = '$nouveau_mot_de_passe' WHERE comptes.identifiant = '$nom_utilisateur'";
faire_requete_sql($sql);
?>
