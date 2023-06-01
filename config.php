<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'crud_simple';

// Подключение к базе данных
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die('Failed Connect ! ' . mysqli_connect_error());
}

?>
