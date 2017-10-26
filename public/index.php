<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$config_directory = __DIR__. '/../app/config/';
require '../src/vendor/autoload.php';
$settings = $config_directory . 'settings.php';

echo $SERVER['DOCUMENT_ROOT'];

$app = new \Slim\App(["settings" => $config]);
require $config_directory . 'depencies.php';
require $config_directory . 'middleware.php';
require $config_directory . 'routes.php';

$app->run();
?>
