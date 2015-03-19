<?php

require '../vendor/autoload.php';
require '../config.php';
require '../constants.php';

use middlewares\HttpAuth;

session_start();

$twigView = new \Slim\Views\Twig();

$app = new \Slim\Slim(array(
    'debug' => true,
    'view' => $twigView,
    'templates.path' => '../views/',
));

// View options
$view = $app->view();

$view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
);

//Router

$routers = glob('../routers/*.router.php');
foreach ($routers as $router) {
    require $router;
}

//Middlewares

$app->add(new HttpAuth());

$app->run();