<?php

$request_uri = $_SERVER['REQUEST_URI'];

if (strpos($request_uri, '/tasks') !== false) {
    require_once 'tasks.php';
} else {
    echo 'API não encontrada.';
}

?>