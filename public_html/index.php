<?php
	session_start();
	require_once __DIR__ . '/../vendor/autoload.php';

	$handler = new App\Handler();

	$channelID  = $handler->dataFilter($_GET['cid']);
	$actionType = $handler->dataFilter($_GET['type']);

	if($channelID == '') {
		$handler->user->redirect('/error/1001');
	}
	//TODO: check channelID with base64
	switch($actionType) {
		default:
			$handler->user->redirect('/error/1000');
		case 'join':
			break;
	}

	$handler->render([
		'tag'   => 'home',
		'title' => 'CryptonClick',
		'user'  => $handler->user->data,
		'link'  => [
			'id'   => $channelID,
			'type' => $actionType
		]
	]);
