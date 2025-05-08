<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ESLR');
define('DB_PASSWORD', 'mia_password');
define('DB_NAME', 'utenti_db');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$conn) {
    die("Errore di connessione: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

// ATTENZIONE: Vulnerabile a SQL Injection – usare mysqli_prepare per sicurezza
$sql = "SELECT * FROM utenti WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "Benvenuto $username";
} else {
    $insert = "INSERT INTO utenti (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $insert)) {
        echo "Benvenuto $username, il login è andato a buon fine";
    } else {
        echo "Errore nella registrazione: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
