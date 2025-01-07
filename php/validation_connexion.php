<?php
function obtenir_compte_correspondant($nom_utilisateur) {
  $configs = include('config.php');

  $pdo_source = "mysql:host={$configs['host']};dbname={$configs['dbname']}";
  $pdo = new PDO($pdo_source, $configs['username'], $configs['password']);
  $sql = "SELECT * FROM comptes WHERE identifiant = '$nom_utilisateur'";
  $requete = $pdo->prepare($sql);
  $requete->execute();
  $resultat = $requete->fetchAll();

  if (sizeof($resultat) === 0) {
    throw new Exception("L'utilisateur '$nom_utilisateur' n'existe pas.");
  }

  return $resultat[0];
}

function verifier_validite_connexion() {
  // A lieu si on essaye d'accéder à cette page sans être connecté
  if (!isset($_POST["nom_utilisateur"])) {
    throw new Exception("Impossible de valider la connexion si vous n'êtes pas connecté.");
  }

  $nom_utilisateur = $_POST["nom_utilisateur"];
  $compte = obtenir_compte_correspondant($nom_utilisateur);

  $mot_de_passe = $_POST["mot_de_passe"];
  $mot_de_passe_attendu = $compte['mot_de_passe'];

  if ($mot_de_passe !== $mot_de_passe_attendu) {
    throw new Exception("Mauvais mot de passe.");
  }

  echo "Bienvenue $nom_utilisateur !";
}

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
?>
