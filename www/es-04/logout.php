<?php
session_start();

// Distruggi la sessione
session_unset();
session_destroy();

// Reindirizza alla pagina di benvenuto
header("Location: index.php");
exit();
?>
