<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "Accesso negato. <a href='login.php'>Accedi</a>";
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Area Riservata</title>
</head>
<body>
    <h2>Benvenuto nella tua area riservata</h2>
    <p>Ciao <strong><?php echo $username; ?></strong>, sei autenticato correttamente!</p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
