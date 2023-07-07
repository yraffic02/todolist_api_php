<?php

require_once '../config/db.php';


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM tasks";
    $result = $conn->query($sql);

    $tasks = array();
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }

    echo json_encode($tasks);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $title = $data['title'];
    $description = $data['description'];

    $sql = "INSERT INTO tasks (title, description) VALUES ('$title', '$description')";
    if ($conn->query($sql) === TRUE) {
        $response = array('message' => 'Tarefa criada com sucesso!');
        echo json_encode($response);
    } else {
        $response = array('error' => 'Erro ao criar a tarefa: ' . $conn->error);
        echo json_encode($response);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);

    $task_id = $data['id'];
    $title = $data['title'];
    $description = $data['description'];

    $sql = "UPDATE tasks SET title='$title', description='$description' WHERE id=$task_id";
    if ($conn->query($sql) === TRUE) {
        $response = array('message' => 'Tarefa atualizada com sucesso!');
        echo json_encode($response);
    } else {
        $response = array('error' => 'Erro ao atualizar a tarefa: ' . $conn->error);
        echo json_encode($response);
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $task_id = $_GET['id'];

    $sql = "DELETE FROM tasks WHERE id=$task_id";
    if ($conn->query($sql) === TRUE) {
        $response = array('message' => 'Tarefa excluída com sucesso!');
        echo json_encode($response);
    } else {
        $response = array('error' => 'Erro ao excluir a tarefa: ' . $conn->error);
        echo json_encode($response);
    }
}

$conn->close();

?>
