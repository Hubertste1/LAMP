<?php
// Funzione per connettersi al database
function connectDb() {
    $host = 'localhost';
    $dbname = 'nome_del_database';
    $username = 'root'; // Inserisci il tuo username del database
    $password = ''; // Inserisci la tua password del database
    try {
        return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
        die("Errore di connessione al database: " . $e->getMessage());
    }
}

// Funzione per verificare il login
function login($username, $password) {
    $db = connectDb();
    $stmt = $db->prepare('SELECT * FROM utenti WHERE username = :username');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Verifica se l'utente esiste e la password è corretta
    if ($user && password_verify($password, $user['password'])) {
        return true;
    }
    return false;
}
?>
