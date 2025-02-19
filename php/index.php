<!--
index.php

Ce fichier se nommait auparavant connexion.php, mais afin d'éviter que les
utilisateurs tombent sur l'arborescence de fichiers en tentant d'aller sur le
dossier php, nous l'avons renommé index.php.
-->
<?php
if (isset($_COOKIE['identifiant'])) {
  require('requetes.php');
  rediriger_vers_flux();
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Grimpe un arbre ! - Connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <div class="conteneur">
      <h1>Connexion</h1>
      <form action="./validation_connexion.php" method="post">
        <div class="noms">
          <label for="nom_utilisateur">Nom d'utilisateur</label>
          <input id="nom_utilisateur" name="nom_utilisateur" required>
          <br>
          <label for="mot_de_passe">Mot de passe</label>
          <input type="password" id="mot_de_passe" name="mot_de_passe" required>
          <div>
            <input type="checkbox" id="afficheur" name="afficheur" onclick="changer_affichage_mot_de_passe()">
            <label for="afficheur" style="text-align: left">Afficher le mot de passe</label>
          </div>
        </div>
        <br>
        <input type="submit" value="Se connecter">
      </form>
      <p>
        <a href="../inscription.html">S'inscrire</a> -
        <a href="../reinitialiser_mdp.html">Mot de passe oublié</a>
      </p>
    </div>
    <script src="../js/gestion_mdp.js"></script>
  </body>
</html>
