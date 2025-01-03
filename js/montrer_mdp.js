function changerAffichageMotDePasse() {
  let input = document.getElementById("mot_de_passe");
  input.type = (input.type === "password") ? "text" : "password";
}