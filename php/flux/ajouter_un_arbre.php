<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Grimpe un arbre - Nouvelle publication</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <?php
    if (!isset($_COOKIE['identifiant'])) {
      header('Location: ../index.php');
    }
    ?>
  </head>
  <body>
    <div class="conteneur">
      <h1>Nouvelle publication</h1>
      <form name="ajouter_arbre" action="./publier.php" method="post">
        <div class="noms">
          <label for="titre" class="requis">Titre</label>
          <!-- id pour le label et name pour la récupération POST en php -->
          <input type="text" id="titre" name="titre" required>
          <br>
          <label for="espece" class="requis">Espèce</label>
          <input type="text" id="espece" name="espece" required>
          <br>
          <label for="coordonnees">Coordonnées</label>
          <input type="text" id="coordonnees" name="coordonnees">
          <br>
          <label for="region">Région</label>
          <input type="text" id="region" name="region">
          <br>
          <label for="hauteur" class="requis">Hauteur (en m)</label>
          <input type="number" id="hauteur" name="hauteur" required>
          <br>  
          <label for="selection_niveau" class="requis">Difficulté</label>
          <select name="difficulte" id="difficulte" required>
            <option value="">--Veuillez choisir une option--</option>
            <option value="facile">Facile</option>
            <option value="moyen">Moyen</option>
            <option value="difficile">Difficile</option>
          </select>
          <br>
          <label for="image">Photo de votre arbre</label>
          <input type="file" id="image">
          <br>
        </div>
        <input type="submit" value="Publier">
      </form>
    </div>
  </body>
</html>
