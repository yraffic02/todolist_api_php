<?php

$host = 'localhost';
$db_name = 'to-do-list';
$username = 'root';
$password = '';

$conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

