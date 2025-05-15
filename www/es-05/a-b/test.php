<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ES05_user');
define('DB_PASSWORD', 'mia_password');
define('DB_NAME', 'ES05');

$conn=mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$conn)
{
    echo '<h1 style="color:red;"> Connesione non riuscita</h1> '. mysqli_connect_error;
}else{
    echo '<h1 style="color:green;"> connesione riuscita</h1>';
}
?>

