<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ES05_user');
define('DB_PASSWORD', 'mia_password');
define('DB_NAME', 'ES05');

$title = "Login";
$html = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if (!$conn) {
        $title = "Errore di Connessione";
        $html = "<p>Errore di connessione al database: " . mysqli_connect_error() . "</p>";
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM utente WHERE username='$username' AND password='$password'";
        $risultato = mysqli_query($conn, $query);

        if (mysqli_num_rows($risultato) > 0) {
            $title = "Accesso riuscito";
            $html = "<p>Benvenuto <strong>$username</strong>, login riuscito.</p>";
        } else {
            $title = "Accesso negato";
            $html = "<p>Nome utente o password errati. <a href=''>Riprova</a></p>";
        }

        mysqli_close($conn);
    }
} else {
    $html = <<<FORM
    <h2>Accedi</h2>
    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Accedi">
    </form>
    FORM;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($title); ?></title>
</head>
<body>
    <?php echo $html; ?>
</body>
</html>