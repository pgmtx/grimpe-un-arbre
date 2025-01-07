function changerAffichageMotDePasse() {
  let mot_de_passe = document.getElementById("mot_de_passe");
  mot_de_passe.type = (mot_de_passe.type === "password") ? "text" : "password";
}

function compterTypesCaractere(texte) {
  let majuscules = 0, minuscules = 0, chiffres = 0;
  for (const caractere of texte) {
    if ('0' <= caractere && caractere <= '9') {
      chiffres++;
    } else if ('A' <= caractere && caractere <= 'Z') {
      majuscules++;
    } else if ('a' <= caractere && caractere <= 'z') {
      minuscules++;
    } 
  }
  return [majuscules, minuscules, chiffres];
}

function infosEntrees() {
  entreeVide = (cle) => document.getElementById(cle) === "";
  return !entreeVide("nom_utilisateur") && !entreeVide("mot_de_passe");
}

function verifierForceMotDePasse() {
  if (!infosEntrees()) {
    return false;
  }

  const longueur_minimum = 8;
  const mot_de_passe_entre = document.getElementById("mot_de_passe").value;
  if (mot_de_passe_entre.length < longueur_minimum) {
    return false;
  }

  const mot_de_passe_confirme = document.getElementById("confirmation_mdp").value;
  if (mot_de_passe_confirme !== mot_de_passe_entre) {
    return false;
  }

  let [majuscules, minuscules, chiffres] = compterTypesCaractere(mot_de_passe_entre);
  return (majuscules > 0) && (minuscules > 0) && (chiffres > 0);
}

function verifierValidite(id, condition) {
  let element = document.getElementById(id);
  if (condition) {
    element.classList.remove("invalide");
    element.classList.add("valide");
  } else {
    element.classList.remove("valide");
    element.classList.add("invalide");
  }
}

function gererAffichageCriteresMotDePasse() {
  let mot_de_passe = document.getElementById("mot_de_passe");

  mot_de_passe.onfocus = () => {
    document.getElementById("message").style.display = "block";
  };

  mot_de_passe.onkeyup = () => {
    verifierValidite("minuscule", mot_de_passe.value.match(/[a-z]/g));
    verifierValidite("majuscule", mot_de_passe.value.match(/[A-Z]/g));
    verifierValidite("chiffre", mot_de_passe.value.match(/[0-9]/g));
    verifierValidite("longueur", mot_de_passe.value.length >= 8);
  };

  let confirmation_mot_de_passe = document.getElementById("confirmation_mdp");
  confirmation_mot_de_passe.onkeyup = () => {
    verifierValidite("memes_mdp", mot_de_passe.value === confirmation_mot_de_passe.value);
  };
}

gererAffichageCriteresMotDePasse();
