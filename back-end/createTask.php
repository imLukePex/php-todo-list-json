<?php

    header('Content-Type: application/json');
    header('Access-Control-Allow-Headers: X-Requested-With');
    header("Access-Control-Allow-Origin: http://localhost:5173");

    $tasks = [
        [
            'text' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae, delectus explicabo quam velit odit ut, voluptatem tempora veritatis recusandae rerum magnam iure illo vero possimus corrupti ipsa eligendi maiores eaque?',
            'completed' => false,
        ],
        [
            'text' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae, delectus explicabo quam velit odit ut',
            'completed' => true,
        ],
        [
            'text' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.?',
            'completed' => false,
        ],
        [
            'text' => 'Ciao mondo',
            'completed' => true,
        ],
    ];

    $newTaskText = $_POST['text'];
    $newTask = [
        'text' => $newTaskText,
        'completed' => false
    ];

    $tasks[] = $newTask;

    $jsonTasks = json_encode($tasks);
    echo $jsonTasks;