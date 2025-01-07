<?php
    try {
      verifier_validite_connexion();
    } catch (Exception $e) {
      echo '<script type="text/javascript">';
      echo 'function revenir_page_connexion() {';
      echo 'window.location.href = "../connexion.html";';
      echo "alert(\"Erreur: {$e->getMessage()}\");";
      echo '}';
      echo 'revenir_page_connexion();';
      echo '</script>';
    }
?>

<?php
function verifier_validite_connexion() {
  if (!isset($_POST["nom_utilisateur"])) {
    throw new Exception("Impossible de valider la connexion si vous n'êtes pas connecté.");
  }

  $configs = include('config.php');
  $nom_utilisateur = $_POST["nom_utilisateur"];

  $pdo_source = "mysql:host={$configs['host']};dbname={$configs['dbname']}";
  $pdo = new PDO($pdo_source, $configs['username'], $configs['password']);
  $sql = "SELECT * FROM comptes WHERE identifiant = '$nom_utilisateur'";
  $requete = $pdo->prepare($sql);
  $requete->execute();
  $resultat = $requete->fetchAll();

  if (sizeof($resultat) == 0) {
    throw new Exception("Il n'y a pas de compte utilisateur avec pour identifiant '$nom_utilisateur'");
  }

  $mot_de_passe = $_POST["mot_de_passe"];
  $mot_de_passe_attendu = $resultat[0]['mot_de_passe'];

  if ($mot_de_passe !== $mot_de_passe_attendu) {
    throw new Exception("Mauvais mot de passe.");
  }

  echo "Bienvenue $nom_utilisateur !";
}
?>
