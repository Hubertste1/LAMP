
<?php
session_start(); // Avvia la sessione

// Verifica se l'utente è autenticato
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
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
    <h1>Benvenuto nella pagina riservata, <?php echo $_SESSION['username']; ?>!</h1>
    <a href="index.php">Torna alla home</a> | <a href="logout.php">Logout</a>
</body>
</html>