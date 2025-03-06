<?php
session_start();

// Controlla se l'utente è già autenticato
if (isset($_SESSION['username'])) {
    header("Location: riservata.php");
    exit();
}

$errmsg = $_GET['error'] ?? "";
$from = $_GET['from'] ?? 'index.php'; // Default 'index.php' se non specificato

// Verifica se il modulo è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica delle credenziali (modifica con un sistema di autenticazione reale)
    if ($username == 'admin' && $password == 'password123') {
        // Imposta la sessione e redirigi l'utente
        $_SESSION['username'] = $username;
        
        // Controlla da dove proveniva la richiesta (pagina di provenienza)
        $redirect_to = $_POST['from'] ?? 'index.php'; // Default è index.php
        header("Location: $redirect_to");
        exit();
    } else {
        // Se le credenziali sono errate, reindirizza con un messaggio di errore
        $url = "login.php?error=Credenziali errate&from=" . urlencode($from);
        header("Location: $url");
        exit();
    }
}
