<?php
session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina di Benvenuto</title>
</head>
<body>
    <h1>Benvenuto nel nostro sito!</h1>
    <?php
    if (isset($_SESSION['username'])) {
        echo "<p>Ciao, " . $_SESSION['username'] . "! <a href='riservata.php'>Vai alla pagina riservata</a></p>";
    } else {
        echo "<p><a href='login.php'>Accedi</a> per accedere alla pagina riservata.</p>";
    }
    ?>
</body>
</html>
