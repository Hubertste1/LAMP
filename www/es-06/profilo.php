<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ES06_user');
define('DB_PASSWORD', 'mia_password');
define('DB_NAME', 'ES06');

session_start();

if (!isset($_SESSION['username'])) {
    echo "Accesso negato. <a href='login.php'>Accedi</a>";
    exit;
}

$username = $_SESSION['username'];
$deluser = $_GET['elimina'] ?? '';

if ($deluser === 'vero') {
    try{
        $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$conn) {
            die("Errore di connessione: " . mysqli_connect_error());
        }

        $query = "DELETE FROM utente WHERE username = '$username'";
        $result = mysqli_query($conn, $query);  
    
        if ($result) {
            session_destroy();
            echo "Account eliminato con successo.";        
        } else {
            echo "Errore durante l'eliminazione: " . mysql_error();
        }

        mysqli_close($conn);
    } catch (Exception $e) {
        // Gestione dell'eccezione
        echo "Errore: " . $e->getMessage();
    }

} else {
    echo "Nessuna azione eseguita.";
}
?>

<!-- Form HTML -->
<!DOCTYPE html>
<html>
<head>
    <title>Profilo utente</title>
</head>
<body>
    <h2>Profilo utente</h2>
    <a href="profilo.php?elimina=vero">Elimina il mio account</a>
</body>
</html>
