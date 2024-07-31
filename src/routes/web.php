<?php

$routes = [
    'GET' => [
        '/' => 'LPWithLatte\controllers\HomeController::index',
        '/teste' => 'LPWithLatte\controllers\TesteController::index',
        '/teste' => 'LPWithLatte\controllers\TesteController::teste',
    ],
    'POST' => [
        '/send' => 'LPWithLatte\controllers\HomeController::send'
    ]
];

return $routes;