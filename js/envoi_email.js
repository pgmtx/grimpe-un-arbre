document.getElementById("formulaire").onsubmit = () => {
  const adresse_destinataire = "programutox@disroot.org";
  const sujet = document.getElementById("sujet").value;
  const sujet_complet = `Grimpe un arbre - ${sujet}`;
  const message = document.getElementById("message_mail").value;
  const lien_mailto = `mailto:${adresse_destinataire}?subject=${sujet_complet}&body=${message}`;
  window.location.href = lien_mailto;
};
