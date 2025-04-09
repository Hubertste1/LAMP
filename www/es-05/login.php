<?php
// Includo il file delle funzioni
include 'functions.php';

// Avvio la sessione PHP per recuperare eventuali dati di sessione
session_start();

$msg = $_GET['error'] ?? '';

if (isset($_SESSION['username'])) {
    $msg = 'Login già effettuato';
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    try {
        // Esegui il login
        [$loginRetval, $loginRetmsg] = login($username, $password);

        $msg = $loginRetmsg;

        if ($loginRetval) {
            // Se login riuscito, salva il nome utente nella sessione
            $_SESSION['username'] = $username;

            // Prepara il link di redirect
            $link = 'Location: ';
            // Se 'from' è stato passato nel POST, usa quel valore, altrimenti usa 'index.php'
            $link .= isset($_POST['from']) && $_POST['from'] ? $_POST['from'] : 'index.php';

            // Fai il redirect
            header($link);
            exit();
        }
    } catch (Exception $e) {
        $msg = 'Errore durante il login: ' . $e->getMessage();
    }
}

// Verifica se 'from' esiste in $_GET, altrimenti assegna un valore vuoto
$from_value = isset($_GET['from']) ? $_GET['from'] : '';

// Form di login
$html_form = <<<FORM
<form action="$_SERVER[PHP_SELF]" method="post">
  <label for="username">Nome utente:</label><input type="text" name="username" placeholder="Nome utente" required/><br />
  <label for="password">Password:</label><input type="password" name="password" placeholder="Password" required/><br />
  <input type="submit" value="Login" /><input type="reset" value="Cancel" />
  <!-- Usa la variabile $from_value per il campo hidden -->
  <input type="hidden" name="from" value="<?= htmlspecialchars($from_value) ?>" />
  <p class='error'><?= htmlspecialchars($msg) ?></p>
</form>
FORM;

// Creo il codice HTML da visualizzare a seconda dei valori di $from e $retval
$html_out = "<p class='error'>$msg</p>";
$html_out .= $html_form;
$html_out .= "Non hai un account? <a href='register.php'>Registrati adesso</a>.<br />";
$html_out .= "Hai dimenticato la password? <a href='pwd_reset.php'>Resetta la password</a>.<br />";
$html_out .= "<a href='index.php'>Torna alla Home Page</a>.<br />";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style>
    .error {
      color: red;
    }
  </style>
</head>
<body>
  <h2>Pagina di login</h2>
  <?=$html_out?>
</body>
</html>
