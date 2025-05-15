<?php
session_start();

$utente=$_SESSION["username"];
$html_link1 = "<a href='login.php'>Login</a>";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login dopo registrazione</title>
</head>
<body>
    <h1>Benvenuto <?php echo $utente?> </h1>
    <?php echo "La registrazione e' andata a buon fine $html_link1"?>
</body>
</html>
