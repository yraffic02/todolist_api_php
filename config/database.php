<?php

$host = '';
$db_name = '';
$username = '';
$password = '';

$conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

