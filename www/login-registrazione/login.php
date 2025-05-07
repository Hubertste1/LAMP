<?php
$host = 'db';
$db   = 'utenti_db';
$user = 'user';
$pass = 'userpass';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Errore di connessione: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM utenti WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Benvenuto $username";
} else {
    $insert = "INSERT INTO utenti (username, password) VALUES ('$username', '$password')";
    if ($conn->query($insert) === TRUE) {
        echo "Benvenuto $username, il login è andato a buon fine";
    } else {
        echo "Errore nella registrazione: " . $conn->error;
    }
}

$conn->close();
?>