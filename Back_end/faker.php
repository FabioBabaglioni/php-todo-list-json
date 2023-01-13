<?php

$todoList = [
    [
        "text" => "todo 1",
        "completed" => true
    ],
    [
        "text" => "todo 2",
        "completed" => true
    ],
    [
        "text" => "todo 3",
        "completed" => false
    ],
    [
        "text" => "todo 4",
        "completed" => false
    ]
];

$jasonToDoList = json_encode($todoList);
file_put_contents("toDo.json", $jasonToDoList);
