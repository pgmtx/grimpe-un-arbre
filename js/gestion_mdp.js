/* gestion_mdp.js
 *
 * Ce script est exécuté dès lors que l'utilisateur entre un mot de passe
 * sur la page de connexion ou de réinitialisation du mot de passe.
 * Il affiche alors les critères du mot de passe et s'ils sont respectés
 * ou non par l'utilisateur.
 */

function changer_affichage_mot_de_passe() {
  let mot_de_passe = document.getElementById("mot_de_passe");
  mot_de_passe.type = (mot_de_passe.type === "password") ? "text" : "password";
}

function compter_types_caractere(texte) {
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

function infos_entrees() {
  entree_vide = (cle) => document.getElementById(cle) === "";
  return !entree_vide("nom_utilisateur") && !entree_vide("mot_de_passe");
}

function verifier_force_mot_de_passe() {
  if (!infos_entrees()) {
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

  let [majuscules, minuscules, chiffres] = compter_types_caractere(mot_de_passe_entre);
  return (majuscules > 0) && (minuscules > 0) && (chiffres > 0);
}

function verifier_validite(id, condition) {
  let element = document.getElementById(id);
  if (condition) {
    element.classList.remove("invalide");
    element.classList.add("valide");
  } else {
    element.classList.remove("valide");
    element.classList.add("invalide");
  }
}

function gerer_affichage_criteres_mot_de_passe() {
  let mot_de_passe = document.getElementById("mot_de_passe");
  let confirmation_mot_de_passe = document.getElementById("confirmation_mdp");

  mot_de_passe.onfocus = () => {
    document.getElementById("message").style.display = "block";
  };

  mot_de_passe.onkeyup = () => {
    verifier_validite("minuscule", mot_de_passe.value.match(/[a-z]/g));
    verifier_validite("majuscule", mot_de_passe.value.match(/[A-Z]/g));
    verifier_validite("chiffre", mot_de_passe.value.match(/[0-9]/g));
    verifier_validite("longueur", mot_de_passe.value.length >= 8);
    verifier_validite("memes_mdp", mot_de_passe.value === confirmation_mot_de_passe.value);
  };

  confirmation_mot_de_passe.onkeyup = () => {
    verifier_validite("memes_mdp", mot_de_passe.value === confirmation_mot_de_passe.value);
  };
}

gerer_affichage_criteres_mot_de_passe();
