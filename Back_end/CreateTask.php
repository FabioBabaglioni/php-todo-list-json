<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: application/json');

// leggo cosa ha scritto l'utente
$text = $_GET["text"];

// recupero il fil ejson
$jasonToDoList = file_get_contents("toDo.json");

// decodifico il file json per la lettura in php
$todoList = json_decode($jasonToDoList);

// mi creo l'oggetto con tutti i parametri e lo pusho al'interno del file php
$todoList[] = [
    "text" => $text,
    "completed" => false
];

// ricodifico il file php in json
$jasonToDoList = json_encode($todoList);

// lo pullo al frontend
file_put_contents("todo.json", $jasonToDoList);