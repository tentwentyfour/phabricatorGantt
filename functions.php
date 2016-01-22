<?php

function getTasks(){

	$conduit = new ConduitClient("https://your.phabricator.com");
	$conduit->setConduitToken("your_conduit_api_token");
	$response = $conduit->callMethodSynchronous('maniphest.query', array());

	return $response;
}

function getUsers(){

	$conduit = new ConduitClient("https://your.phabricator.com");
	$conduit->setConduitToken("your_conduit_api_token");
	$response = $conduit->callMethodSynchronous('user.query',array());

	return $response;
}

?>
