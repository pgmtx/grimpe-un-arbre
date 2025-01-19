/* filtrage_arbres.js
 *
 * Ce script permet de gérer une barre de recherche pour afficher les
 * publications correspondant aux mot-clés entrés.
 * Il n'est pas encore utilisé par le site.
 */

document.addEventListener("DOMContentLoaded", () => {
  const searchInput = document.getElementById("search");

  searchInput.addEventListener("input", () => {
    const filter = searchInput.value.toLowerCase();

    publication.forEach(publication => {
      const contenu = publication.querySelector("p:nth-of-type(1)").textContent.toLowerCase();
      const auteur = publication.querySelector("p:nth-of-type(2)").textContent.toLowerCase();

      if (contenu.includes(filter) || auteur.includes(filter)) {
        publication.style.display = "block";
      } else {
        publication.style.display = "none";
      }
    });
  });
});
