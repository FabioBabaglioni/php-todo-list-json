<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: application/json');

$text = $_get["newTask"];

$jasonToDoList = file_get_contents("toDo.json");
$todoList = json_decode($jasonToDoList);

$todoList[] = [
    "text" => $newTask,
    "completed" => false
];

$jasonToDoList = json_encode($todoList);
file_put_contents("todo.json", $jasonToDoList);