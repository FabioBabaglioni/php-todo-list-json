<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: application/json');

$text = $_GET["text"];

$jasonToDoList = file_get_contents("toDo.json");
$todoList = json_decode($jasonToDoList);

$todoList[] = [
    "text" => $text,
    "completed" => false
];

$jasonToDoList = json_encode($todoList);
file_put_contents("todo.json", $jasonToDoList);