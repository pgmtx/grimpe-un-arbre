<?php
function faire_requete_sql($sql) {
  $configs = include('config.php');

  $pdo_source = "mysql:host={$configs['host']};dbname={$configs['dbname']}";
  $pdo = new PDO($pdo_source, $configs['username'], $configs['password']);
  $requete = $pdo->prepare($sql);
  $requete->execute();

  return $requete;
}

function obtenir_compte_correspondant($nom_utilisateur) {
  $sql = "SELECT * FROM comptes WHERE identifiant = '$nom_utilisateur'";
  $requete = faire_requete_sql($sql);
  $resultat = $requete->fetchAll();

  if (sizeof($resultat) === 0) {
    return null;
  }

  return $resultat[0];
}

function verifier_validite_connexion() {
  session_start();

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

  $_SESSION['identifiant'] = $nom_utilisateur;
  header('Location: ./flux.php');
  die();
}

/* Ne s'exécute que si le fichier lui-même est exécuté.
 * Cela permet d'éviter des appels de fonctions non souhaités lors d'un `require`.
*/
if (!debug_backtrace()) {
  try {
    verifier_validite_connexion();
  } catch (Exception $e) {
    echo "<script type=\"text/javascript\">
      function revenir_page_connexion() {
      window.location.href = \"../connexion.html\";
      alert(\"Erreur: {$e->getMessage()}\");
      };
      revenir_page_connexion();
    </script>";
  }
}
?>
