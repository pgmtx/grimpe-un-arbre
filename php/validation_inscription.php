<?php
  $nom_utilisateur = $_POST["nom_utilisateur"];
  echo "<p>Bienvenue $nom_utilisateur !</p>";

  $niveau = $_POST["selection_niveau"];

  switch ($niveau) {
    case '1':
      echo "<p>Ne t'inquiète pas ça va bien se passer.</p>";
      break;

    case '2':
      echo "<p>Tu as déjà effectué deux trois grimpades. Améliorons ça !</p>";
      break;

    case '3':
      echo "<p>T'y es fortiche, tu pourras aider les autres !</p>";
      break;

    default:
      throw new Exception("Niveau invalide : $niveau", 1);
  }
?>