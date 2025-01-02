<?php
  $nom_utilisateur = $_POST["nom_utilisateur"];
  assert(!empty(nom_utilisateur), "Le nom d'utilisateur est vide.");
  echo "Content de te revoir " . $nom_utilisateur . " !";
?>