<?php

header("Content-Type: application/json");
$tasks = [
    1 => ['id' =>1, 'title' => 'Estudar PHP', 'completed' => false],
    2 => ['id' =>2, 'title' => 'Fazer exercicios', 'completed' => true],
];
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO']?? '', '/'));

$resource = $request[0] ?? null;
$id = $request[1] ?? null;

function send_json($data, $status=200){
    http_response_code($status);
    echo json_encode($data);
    exit;
}

if($resource !== 'tasks'){
    send_json(['error' => 'Recurso não encontrado'], 404);
}
switch($method){
    case 'GET':
    if ($id) {
        if (isset($tasks[$id])) {
            send_json($tasks[$id]);
        } else {
            send_json(['error' => 'Tarefa não encontrada'], 404);
        }
    } else {
        send_json(array_values($tasks));
    }
    break;

    case 'POST':
    $input = json_decode(file_get_contents('php://input'), true);
    if (!isset($input['title'])) {
        send_json(['error' => 'Título é obrigatório'], 400);
    }
    $newId = max(array_keys($tasks)) + 1;
    $tasks[$newId] = ['id' => $newId, 'title' => $input['title'], 'completed' => false];
    send_json($tasks[$newId], 201);
    break;

    case 'PUT':
    if (!$id || !isset($tasks[$id])) {
        send_json(['error' => 'Tarefa não encontrada'], 404);
    }
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['title'])) $tasks[$id]['title'] = $input['title'];
    if (isset($input['completed'])) $tasks[$id]['completed'] = $input['completed'];
    send_json($tasks[$id]);
    break;

    case 'DELETE':
    if (!$id || !isset($tasks[$id])) {
        send_json(['error' => 'Tarefa não encontrada'], 404);
    }
    unset($tasks[$id]);
    send_json(['message' => 'Tarefa deletada']);
    break;
};