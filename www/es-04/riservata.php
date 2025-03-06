<?php
session_start();

// Verifica se l'utente è autenticato
if (!isset($_SESSION['username'])) {
    // Se non è autenticato, reindirizza alla pagina di login con un messaggio di errore
    $url = 'login.php?error=Devi fare prima il login&from=' . urlencode(basename($_SERVER['PHP_SELF']));
    header("Location: $url");
    exit();
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Riservata</title>
</head>
<body>
    <h1>Benvenuto, <?php echo $_SESSION['username']; ?>!</h1>
    <p>Questa è la pagina riservata.</p>
    <a href="logout.php">Esci</a>
</body>
</html>
