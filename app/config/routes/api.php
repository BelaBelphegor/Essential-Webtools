<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

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


