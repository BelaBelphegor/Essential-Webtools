<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../src/vendor/autoload.php';
$config_directory = __DIR__. '/../app/config/';
$settings = require $config_directory . 'settings.php';

$app = new \Slim\App(["settings" => $settings]);
require $config_directory . 'depencies.php';
require $config_directory . 'middleware.php';
require $config_directory . 'routes.php';
$app->run();
