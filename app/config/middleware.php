<?php

use Slim\Http\Request as Request;
use Slim\Http\Response as Response;


/*
 * Add Middleware here.
 * JwtAuthentification by tuupola
 */
$app->add(new \Slim\Middleware\JwtAuthentification(
	[
		"secret" => "toto";
		// add logger => here
	]));
