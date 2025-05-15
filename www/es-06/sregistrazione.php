<?php
session_start();

$username=$_SESSION["username"];
$html_link1 = "<a href='login.php'>Login</a>";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login dopo registrazione</title>
</head>
<body>
    <h2>Benvenuto <?php $username?>, la registrazione e' andata a buon fine</h2>
    <?php echo $html_link1?>
</body>
</html>
