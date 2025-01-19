<!--
requetes.php

Ce module regroupe des fonctions usuelles pour effectuer des requêtes SQL à
l'aide de PDO.
-->

<?php
function creer_pdo() {
  $configs = include('config.php');

  $pdo_source = "mysql:host={$configs['host']};dbname={$configs['dbname']}";
  $pdo = new PDO($pdo_source, $configs['username'], $configs['password']);
  return $pdo;
}

/* Fonction aux paramètres variadiques
 *
 * Contrairement à l'ancienne version, cette fonction gère correctement les
 * apostrophes.
 * $arguments doit être composé de couples format/variable pour utiliser bindParam.
 *
 * Exemple :
 * $sql = "INSERT INTO publications (titre, auteur, contenu) VALUES (:titre, :auteur, :contenu)";
 * faire_requete_sql($sql, ':titre', $titre, ':auteur', $auteur, ':contenu', $contenu);
 */
function faire_requete_sql($sql, ...$arguments) {
  $nombre_arguments = count($arguments);

  // Comme on ne veut que des couples, la taille d'arguments doit être pair.
  assert($nombre_arguments % 2 === 0);

  $pdo = creer_pdo();

  // Permet au pdo de ne pas déclencher d'exception si execute() se passe mal.
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  $requete = $pdo->prepare($sql);

  for ($i = 0; $i < $nombre_arguments; $i += 2) {
    $requete->bindParam($arguments[$i], $arguments[$i+1]);
  }

  /* Si la requête n'a pas abouti, cela veut (potentiellement) dire que les tables
   * ne figurent dans la base de données.
   * Dans ce cas, on exécute ces instructions pour les créer.
   *
   * Par ailleurs, le contenu du fichier ne contient aucun commentaire, ce qui
   * est volontaire afin que les requêtes du fichier s'exécutent plus rapidement,
   * bien que cela prenne toujours un peu de temps.
   */
  if (!$requete->execute()) {
    $contenu_fichier = file_get_contents("../grimpe_un_arbre.sql");
    $requete = $pdo->prepare($contenu_fichier);
    $requete->execute();
  }
  return $requete;
}

function obtenir_compte_correspondant($nom_utilisateur) {
  $sql = "SELECT * FROM comptes WHERE identifiant = :nom_utilisateur";
  $requete = faire_requete_sql($sql, ':nom_utilisateur', $nom_utilisateur);
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
?>
