<?php
require_once 'libphutil/src/__phutil_library_init__.php';
$conduit_uri = "https://cator.1024.lu";
$conduit_token = "api-kdlrgt2omjipc6uoclyrvw4xr54l";
$conduit_parameters = array();

function getTasks(){

	$conduit = new ConduitClient("https://cator.1024.lu");
	$conduit->setConduitToken("api-kdlrgt2omjipc6uoclyrvw4xr54l");
	$response = $conduit->callMethodSynchronous('maniphest.query', array());

	return $response;
}

function getUsers(){

	$conduit = new ConduitClient("https://cator.1024.lu");
	$conduit->setConduitToken("api-kdlrgt2omjipc6uoclyrvw4xr54l");
	$response = $conduit->callMethodSynchronous('user.query',array());

	return $response;
}

?>
