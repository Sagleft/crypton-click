<?php
	session_start();
	require_once __DIR__ . "/../vendor/autoload.php";

	$handler = new App\Handler();
	$handler->render([
		'tag'   => 'home',
		'title' => 'CryptonClick',
		'user'  => $handler->user->data
	]);
