<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Grimpe un arbre ! - Flux</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="../css/style.css">-->
    <script src="../js/gestion_deconnexion.js"></script>
  </head>
  <body>
    <div style="text-align: right" id="bouton_interaction">
      <span style="vertical-align: middle">
        <?php
        /* Permet de récupérer des déclarations d'autres fichiers */
        session_start();
        echo $_SESSION['identifiant'];
        ?>
      </span>
      <img alt="Photo de profil" src="../static/photo_profil.png" width="32" height="32" style="vertical-align: middle">
    </div>
  </body>
</html>
