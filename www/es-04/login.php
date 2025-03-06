<?php
session_start();

// Controlla se l'utente è già autenticato
if (isset($_SESSION['username'])) {
    // Se l'utente è già autenticato, reindirizzalo alla pagina riservata
    header("Location: riservata.php");
    exit();
}

// Recupera il messaggio di errore passato tramite query string (se presente)
$errmsg = $_GET['error'] ?? "";

// Recupera la pagina di provenienza per il reindirizzamento dopo il login
$from = $_GET['from'] ?? 'index.php'; // Default è 'index.php' se non c'è il parametro 'from'

// Gestisce il login quando il modulo è inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica delle credenziali (modifica con il tuo sistema di autenticazione)
    if ($username == 'admin' && $password == 'password123') {
        // Imposta la sessione e redirigi l'utente
        $_SESSION['username'] = $username;
        
        // Controlla la pagina da cui proviene la richiesta (pagina di provenienza)
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
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .err {
            color: #FF0000;
        }
    </style>
</head>
<body>
    <h1>Accedi</h1>

    <!-- Mostra il messaggio di errore se presente -->
    <?php if ($errmsg): ?>
        <p class="err"><?= htmlspecialchars($errmsg) ?></p>
    <?php endif; ?>

    <!-- Modulo di login -->
    <form method="POST" action="login.php">
        <label for="username">Nome utente:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <!-- Campo nascosto per ricordare la pagina di provenienza -->
        <input type="hidden" name="from" value="<?= htmlspecialchars($from) ?>">

        <button type="submit">Accedi</button>
    </form>
</body>
</html>
