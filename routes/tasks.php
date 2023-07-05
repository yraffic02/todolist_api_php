<?php
require_once '../models/Task.php';

$task = new Task($conn);

$method = $_SERVER['REQUEST_METHOD'];


switch ($method) {
    case 'GET':

        $stmt = $task->read();
        $num = $stmt->rowCount();

        if ($num > 0) {
            $tasks_arr = array();
            $tasks_arr['data'] = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $task_item = array(
                    'id' => $id,
                    'title' => $title,
                    'description' => $description
                );

                array_push($tasks_arr['data'], $task_item);
            }

            echo json_encode($tasks_arr);
        } else {
            echo json_encode(array('message' => 'Nenhuma tarefa encontrada.'));
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"));

        $task->title = $data->title;
        $task->description = $data->description;

        if ($task->create()) {
            echo json_encode(array('message' => 'Tarefa criada com sucesso.'));
        } else {
            echo json_encode(array('message' => 'Não foi possível criar a tarefa.'));
        }
        break;

    case 'PATCH':
        $data = json_decode(file_get_contents("php://input"));

        $task->id = $data->id;
        $task->title = $data->title;
        $task->description = $data->description;

        if ($task->update()) {
            echo json_encode(array('message' => 'Tarefa atualizada com sucesso.'));
        } else {
            echo json_encode(array('message' => 'Não foi possível atualizar a tarefa.'));
        }
        break;

    case 'DELETE':

        $data = json_decode(file_get_contents("php://input"));

        $task->id = $data->id;

        if ($task->delete()) {
            echo json_encode(array('message' => 'Tarefa excluída com sucesso.'));
        } else {
            echo json_encode(array('message' => 'Não foi possível excluir a tarefa.'));
        }
        break;

    default:
        http_response_code(404);
        echo json_encode(array('message' => 'Método não permitido.'));
        break;
}
?>
