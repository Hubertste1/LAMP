<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ES06_user');
define('DB_PASSWORD', 'mia_password');
define('DB_NAME', 'ES06');

session_start();
try{if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die("Errore di connessione: " . mysqli_connect_error());
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $email = $_POST['email'];

    // Controllo campi obbligatori
    if (empty($username) || empty($password) || empty($cpassword) || empty($email)) {
        echo "Tutti i campi sono obbligatori.";
    } elseif ($password !== $cpassword) {
        echo "Le password non coincidono.";
    } else {
        // Controlla se esiste già
        $checkQuery = "SELECT * FROM utente WHERE username='$username'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            echo "Username già in uso.";
        } else {
            // Inserimento nuovo utente
            $query = "INSERT INTO utente (username, password, email) VALUES ('$username', '$password', '$email')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "Registrazione avvenuta con successo. <a href='login.php'>Vai al login</a>";
            } else {
                echo "Errore durante la registrazione: " . mysqli_error($conn);
            }
        }
    }

    mysqli_close($conn);
}
}catch(Exception $e){
echo $e->getMessage();
}

?>

<!-- Form HTML -->
<!DOCTYPE html>
<html>
<head>
    <title>Registrazione</title>
</head>
<body>
    <h2>Registrati</h2>
    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Conferma Password:</label><br>
        <input type="password" name="cpassword" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <input type="submit" value="Registrati">
    </form>

    <p>Hai già un account? <a href="login.php">Accedi qui</a></p>
</body>
</html>
