<?php
session_start(); // Avvia la sessione

// Distruggi la sessione per fare il logout
session_destroy();

// Reindirizza l'utente alla home
header('Location: index.php');
exit;
?>
