<?php
// Connessione al database
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ES05_user');
define('DB_PASSWORD', 'mia_password');
define('DB_NAME', 'ES05');

$conn = mysqli_connect($host, $user, $password, $database);

// Controllo della connessione
if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}

// Query per ottenere le tabelle
$query = "SHOW TABLES FROM $database";
$result = mysqli_query($conn, $query);

// Visualizzazione delle tabelle
if ($result) {
    echo "<h3>Tabelle presenti nel database <em>$database</em>:</h3>";
    echo "<ul>";
    while ($row = mysqli_fetch_row($result)) {
        echo "<li>" . $row[0] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Errore nella query: " . mysqli_error($conn);
}

// Chiusura della connessione
mysqli_close($conn);
?>