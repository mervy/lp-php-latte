<?php

use LPWithLatte\library\Router;

ini_set("display_errors", true);

require '../vendor/autoload.php';
$routes = require '../src/routes/web.php';

try {
    (new Router($routes))->start();
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}