<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Grimpe un arbre - Nouvelle publication</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <?php
    if (!isset($_COOKIE['identifiant'])) {
      header('Location: ./');
    }
    ?>
  </head>
  <body>
    <div class="conteneur">
      <h1>Nouvelle publication</h1>
      <form name="ajouter_arbre" action="formulaire.php" method="post">
        <div class="noms">
          <label for="espece" class="requis">Espèce</label>
          <input type="text" id="espece" required>
          <br>
          <label for="coordonnees">Coordonnées</label>
          <input type="text" id="coordonnees">
          <br>
          <label for="region">Région</label>
          <input type="text" id="region">
          <br>
          <label for="hauteur" class="requis">Hauteur (en m)</label>
          <input type="number" id="hauteur" required>
          <br>
          <label for="selection_niveau" class="requis">Difficulté</label>
          <select name="selection_niveau" id="selection_niveau" required>
            <option value="">--Veuillez choisir une option--</option>
            <option value="1">Facile</option>
            <option value="2">Moyen</option>
            <option value="3">Difficile</option>
          </select>
          <br>
          <label for="image">Photo de votre arbre</label>
          <input type="file" id="image">
          <br>
        </div>
        <input type="submit" value="S'inscrire">
      </form>
    </div>
  </body>
</html>
