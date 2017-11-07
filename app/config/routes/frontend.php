<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function(Request $request, Response $response) {
	$response = $this->view->render($response, 'main.phtml', ["router" => $this->router]);
	return ($reponse);
});

