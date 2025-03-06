<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica le credenziali (modifica con il tuo controllo)
    if ($username == 'admin' && $password == 'password123') {
        $_SESSION['username'] = $username;
        header("Location: index.php"); // Reindirizza alla pagina di benvenuto
        exit();
    } else {
        $errore = "Credenziali errate!";
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
    <h1>Accedi</h1>
    <form method="POST">
        <label for="username">Nome utente:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Accedi</button>
    </form>
    <?php
    if (isset($errore)) {
        echo "<p style='color:red;'>$errore</p>";
    }
    ?>
</body>
</html>
