<?php
// Même pour effacer une variable session, on doit utiliser session_start
session_start();

// Supprime la session user

unset($_SESSION['user']);

// Création d'un message dfe deconnexion en session
$_SESSION['message'] = "Vous avez été déconnecté du service.";
header('location: index.php');
die();

?>