<?php
function obtenir_mois_francais($mois) {
  $mois_anglais = array(
    "January", "February", "March", "April", "May", "June", "July",
    "August", "September", "October", "November", "Décember"
  );
  $mois_francais = array(
    "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet",
    "Août", "Septembre", "Octobre", "Novembre", "Décembre"
  );
  assert(count($mois_anglais) === count($mois_francais));

  $indice = array_search($mois, $mois_anglais);
  return $mois_francais[$indice];
}

/* Renvoie une date formatée en français
 * Ici $date_brute correspond aux timestamps SQL avec le format YYYY-MM-DD hh:mm:ss.
 */
function obtenir_date($date_brute, $heure_incluse=false) {
  $longueur_date = strlen('YYYY-MM-DD');
  $sans_heures = substr($date_brute, 0, $longueur_date);
  $date_creation = DateTime::createFromFormat('Y-m-d', $sans_heures);
  $sortie = explode(' ', $date_creation->format('j F Y')); // jour Mois année
  $sortie[1] = obtenir_mois_francais($sortie[1]);
  if ($heure_incluse) {
    $sortie[] = 'à ' . substr($date_brute, $longueur_date + 1, strlen('hh:mm')); // On ignore les secondes
  }
  return join(' ', $sortie);
}
?>
