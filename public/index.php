<?php

require '../vendor/autoload.php';
require '../Config.php';


$app = new \Slim\Slim(array(
    'debug' => true,
    'templates.path' => '../views/',
));

// require '../config/app.php';
// require '../config/connectionBD.php';

// session_start();

// $db = conection('localhost', 'setour', 'root', 'root');

$routers = glob('../routers/*.router.php');
foreach ($routers as $router) {
    require $router;
}

$app->run();