#!/usr/bin/env bash

# Ce programme permet de générer rapidement et simplement un fichier config.php
# Il demande un nom d'utilisateur et un mot de passe.

main() {
  if [ -f ./php/config.php ] && [[ $1 != "--force" ]]; then
    echo "Le fichier config.php existe déjà."
    return
  fi

  echo -n "Nom utilisateur : "
  read nom_utilisateur

  echo -n "Mot de passe : "
  read -s mot_de_passe
  echo ""

  echo "<?php
return array(
  'host' => 'localhost',
  'dbname' => '$nom_utilisateur',
  'username' => '$nom_utilisateur',
  'password' => '$mot_de_passe',
);
?>" > php/config.php
}

main $1
