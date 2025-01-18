<?php
function creer_pdo() {
  $configs = include('config.php');

  $pdo_source = "mysql:host={$configs['host']};dbname={$configs['dbname']}";
  $pdo = new PDO($pdo_source, $configs['username'], $configs['password']);
  return $pdo;
}

function faire_requete_sql($sql) {
  $pdo = creer_pdo();
  $requete = $pdo->prepare($sql);
  /* Si la requête n'a pas abouti, cela veut potentiellement dire que les tables
   * ne figurent dans la base de données.
   * On exécute ces instructions pour les créer si nécessaire.
   */
  if (!$requete) {
    $contenu_fichier = file_get_contents("../grimpe_un_arbre.sql");
    $requete = $pdo->prepare($contenu_fichier);
  }
  $requete->execute();

  return $requete;
}

function obtenir_compte_correspondant($nom_utilisateur) {
  $sql = "SELECT * FROM comptes WHERE identifiant = '$nom_utilisateur'";
  $requete = faire_requete_sql($sql);
  $resultat = $requete->fetchAll();

  if (count($resultat) === 0) {
    return null;
  }

  return $resultat[0];
}

function rediriger_vers_flux($nom_utilisateur=null) {
  if (!is_null($nom_utilisateur)) {
    // On crée un cookie qui dure 30 jours valable sur tout le site
    setcookie("identifiant", $nom_utilisateur, time() + (86400 * 30), "/");
  }
  header('Location: ./flux/');
  die();
}

function formater_pour_sql($texte) {
  $pdo = creer_pdo();
  return $pdo->quote($texte);
}
?>
