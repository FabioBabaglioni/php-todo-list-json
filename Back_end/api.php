<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: application/json');

// prendo i file dal json
$jasonToDoList = file_get_contents("toDo.json");

// leggo il json
echo $jasonToDoList;