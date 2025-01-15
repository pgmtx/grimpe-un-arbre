<?php
// Pour supprimer un cookie, on utilise setcookie mais avec une date passée
setcookie('identifiant', '', time() - 3600, '/');
header('Location: ./connexion.php');
die();
?>
