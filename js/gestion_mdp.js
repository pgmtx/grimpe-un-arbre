function changerAffichageMotDePasse() {
  let input = document.getElementById("mot_de_passe");
  input.type = (input.type === "password") ? "text" : "password";
}

function compterTypesCaractere(texte) {
  let majuscules = 0, minuscules = 0, chiffres = 0;
  for (const caractere of texte) {
    if ('0' <= caractere && caractere <= '9') {
      chiffres++;
    } else if (caractere === caractere.toUpperCase()) {
      majuscules++;
    } else if (caractere === caractere.toLowerCase()) {
      minuscules++;
    } 
  }
  return [majuscules, minuscules, chiffres];
}

function infosEntrees() {
  entreeVide = (cle) => document.forms["formulaire"][cle] === "";
  return !entreeVide("nom_utilisateur") && !entreeVide("mot_de_passe");
}

function verifierForceMotDePasse() {
  if (!infosEntrees()) {
    return false;
  }

  const taille_minimum = 8;
  const mot_de_passe = document.forms["formulaire"]["mot_de_passe"].value;
  if (mot_de_passe.length < taille_minimum) {
    return false;
  }

  let [majuscules, minuscules, chiffres] = compterTypesCaractere(mot_de_passe);
  console.log([majuscules, minuscules, chiffres]);
  return (majuscules > 0) && (minuscules > 0) && (chiffres > 0);
}
