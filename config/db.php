<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "to-do-list";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

?>

