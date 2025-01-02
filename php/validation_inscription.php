<?php
  $nom_utilisateur = $_POST["nom_utilisateur"];
  echo "<p>Bienvenue $nom_utilisateur !</p>";

  $niveau = $_POST["niveau_grimpe"];

  switch ($niveau) {
    case 'débutant':
      echo "<p>Ne t'inquiète pas ça va bien se passer.</p>";
      break;
    
    case 'intermédiaire':
      echo "<p>Tu as déjà effectué deux trois grimpades. Améliorons ça !</p>";
      break;
    
    default:
      echo "<p>T'y es fortiche, tu pourras aider les autres !</p>";
      break;
  }
?>