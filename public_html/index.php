<?php
	session_start();
	require_once __DIR__ . '/../vendor/autoload.php';

	function getLinkType($actionType = ''): string {
		switch($actionType) {
			default: return '';
			case 'join': return 'joinChannelById';
		}
	}

	$handler = new App\Handler();
	$channelID  = $handler->dataFilter($_GET['cid']);
	$actionType = $handler->dataFilter($_GET['type']);
	$linkData = [
		'id'   => '', 'type' => '', 'typedecoded' => '',
	];
	$renderData = [
		'tag'   => 'home',
		'title' => 'CryptonClick',
		'user'  => $handler->user->data,
		'link'  => $linkData,
	];

	if($channelID != '') {
		//link available
		//TODO: check channelID with base64
		switch($actionType) {
			default:
				$handler->user->redirect('/error/1000');
			case '':     break;
			case 'join': break;
		}
		//update link data
		$renderData['tag'] = 'link';
		$renderData['link']['id']   = $channelID;
		$renderData['link']['type'] = $actionType;
		//TOQ: handle empty result
		$renderData['link']['typedecoded'] = getLinkType($actionType);
		$handler->render($renderData);
	}

	//no link available
	$handler->render($renderData);
