<?php

session_start();

$utente = $_SESSION['utente'] ?? "Ospite";

$html_link1 = "<a href='login.php'>Login</a>";
$html_link2 = "<a href='logout.php'>Logout</a>";
$html_link3 = "<a href='registrazione.php'>Registrati</a>";

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ES 06</title>
</head>
<body>    
    <h1>Benvenuto <?=$utente?></h1>
    <?=$html_link1?>
    <?=$html_link2?>
    <?=$html_link3?>
</body> 
</html>

