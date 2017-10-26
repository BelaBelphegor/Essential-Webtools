<?php

$app->get('/', function(Request $request, Response $response) {
	$response = $this->view->render($response, 'main.phtml', ["router" => $this->router]);
	return ($reponse);
});

