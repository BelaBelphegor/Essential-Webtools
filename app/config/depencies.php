<?php

$container = $app->getContainer();

$container['view'] = new \Slim\Views\PhpRenderer("../src/templates/");

$container['logger'] = function($c) {
		$logger = new \Monolog\Logger('movida_logger');
		$file_handler = new \Monolog\Handler\StreamHandler("../src/logs/app.log");
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

