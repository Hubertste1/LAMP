<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ES05_user');
define('DB_PASSWORD', 'mia_password');
define('DB_NAME', 'ES05');

session_start();

if (isset($_SESSION['username'])) {
    echo "Sei già loggato come <strong>" . $_SESSION['username'] . "</strong>. <a href='logout.php'>Logout</a>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die("Errore di connessione: " . mysqli_connect_error());
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM utente WHERE username='$username' AND password='$password'";
    $risultato = mysqli_query($conn, $query);

    if (mysqli_num_rows($risultato) > 0) {
        $_SESSION['username'] = $username;
        header("Location: riservata.php");
    } else {
        echo "Nome utente o password errati.";
    }

    mysqli_close($conn);
}
?>

<!-- Form HTML -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Accedi</h2>
    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Accedi">
    </form>
</body>
</html>