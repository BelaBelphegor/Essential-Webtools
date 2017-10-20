<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
$config['db']['host']   = "localhost";
$config['db']['user']   = "root";
$config['db']['pass']   = "cq0OwLnS";
$config['db']['dbname'] = "movida";

$app = new \Slim\App(["settings" => $config]);
$container = $app->getContainer();

$container['view'] = new \Slim\Views\PhpRenderer("../templates/");

$container['logger'] = function($c) {
		$logger = new \Monolog\Logger('movida_logger');
		$file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
		$logger->pushHandler($file_handler);
		return ($logger);
};

$container['db'] = function($c) {
	$db = $c['settings']['db'];
	$pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
		$db['user'], $db['pass']);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	return ($pdo);
};

$app->group('/api', function()
{
	$this->get('/', function(Request $request, Response $response)
	{
		$response->getBody()->write("Welcome on movida RESTfull API currently on version 1.0.0");
		return $response;
	});

	$this->group('/v1', function()
	{
		$this->get('/video', function(Request $request, Response $response) {
			$mapper = new VideoMapper($this->db);
			$videos = $mapper->getVideos();
			return $response->withJson(json_encode($videos));
		})->setName('api-video');

		$this->get('/video/{id}', function(Request $request, Response $response) {
			$video_id = (int)($args['id']);
			$mapper = new VideoMapper($this->db);
			$video = $mapper->getVideoById($video_id);
			return $response->withJson(json_encode($videos));
		});
	});
});

$app->get('/', function(Request $request, Response $response) {
	$response = $this->view->render($response, 'main.phtml', ["router" => $this->router]);
	return ($reponse);
});

$app->run();
?>
