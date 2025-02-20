<?php
session_start(); // Avvia la sessione

// Verifica se l'utente è autenticato
$user = isset($_SESSION['username']) ? $_SESSION['username'] : "Ospite";
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina di Benvenuto</title>
</head>
<body>
    <h1>Benvenuto, <?php echo $user; ?>!</h1>
    <?php if ($user == "Ospite"): ?>
        <a href="login.php">Accedi</a>
    <?php else: ?>
        <a href="riservata.php">Pagina Riservata</a> | 
        <a href="logout.php">Logout</a>
    <?php endif; ?>
</body>
</html>
