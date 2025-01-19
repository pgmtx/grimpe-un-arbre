/* filtrage_arbres.js
 *
 * Ce script permet de gérer une barre de recherche pour afficher les
 * publications correspondant aux mot-clés entrés.
 * Il n'est pas encore utilisé par le site.
 */

document.addEventListener("DOMContentLoaded", () => {
  const searchInput = document.getElementById("search");
  const arbreContainer = document.getElementById("arbre-container");

  searchInput.addEventListener("input", () => {
    const filter = searchInput.value.toLowerCase();
    const arbres = arbreContainer.querySelectorAll(".arbre");

    arbres.forEach(arbre => {
      const espece = arbre.querySelector("p:nth-of-type(1)").textContent.toLowerCase();
      const region = arbre.querySelector("p:nth-of-type(2)").textContent.toLowerCase();
      const difficulte = arbre.querySelector("p:nth-of-type(3)").textContent.toLowerCase();

      if (espece.includes(filter) || region.includes(filter) || difficulte.includes(filter)) {
        arbre.style.display = "block";
      } else {
        arbre.style.display = "none";
      }
    });
  });
});
