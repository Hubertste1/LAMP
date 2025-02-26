<?php
session_start(); // Avvia la sessione

// Se l'utente è già loggato, mostra i link per la pagina riservata e logout
if (isset($_SESSION['username'])) {
    echo "Login già effettuato. <a href='riservata.php'>Vai alla pagina riservata</a> | <a href='logout.php'>Logout</a>";
    exit;
}

// Se il modulo di login è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password)) {
        $_SESSION['username'] = $username;
        echo "Login avvenuto con successo! <a href='riservata.php'>Vai alla pagina riservata</a> | <a href='logout.php'>Logout</a>";
    } else {
        echo "Credenziali errate. Riprova.";
    }
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Effettua il Login</h1>
    <form method="POST" action="login.php">
        <label for="username">Nome utente:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Accedi</button>
    </form>
</body>
</html>
