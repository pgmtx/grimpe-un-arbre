<!--
deconnexion.php

Cette page s'exécute une fois que l'utilisateur se déconnecte.
-->

<?php
// Pour supprimer un cookie, on utilise setcookie mais avec une date passée
setcookie('identifiant', '', time() - 3600, '/');
header('Location: ./index.php');
die();
?>
