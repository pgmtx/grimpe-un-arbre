function changer_affichage_dropdown() {
  document.getElementById("mon_dropdown").classList.toggle("affichable");
}

// Fait en sorte que le dropdown se referme lorsque l'on clique ailleurs'
window.onclick = (event) => {
  if (!event.target.matches(".bouton_dropdown")) {
    let dropdowns = document.getElementsByClassName("contenu_dropdown");
    for (let openDropdown of dropdowns) {
      if (openDropdown.classList.contains("affichable")) {
        openDropdown.classList.remove("affichable");
      }
    }
  }
}
