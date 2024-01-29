<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Headers: X-Requested-With');
    header("Access-Control-Allow-Origin: http://localhost:5173");



    $tasks = [
        [
            'text' => 'Fare la spesa',
            'completed' => false,
        ],
        [
            'text' => 'Fare il bucato',
            'completed' => true,
        ],
        [
            'text' => 'Fare il letto',
            'completed' => false,
        ],
        [
            'text' => 'Fare la lavastoviglie',
            'completed' => true,
        ],
    ];

    echo json_encode($tasks);

    file_put_contents("tasks.json", $jsonTasks);