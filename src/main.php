<?php

	include 'requesthandler.php';

	function customError($errno, $errstr) {
		echo "Error : [$errno] $errstr";
	}

	set_error_handler("customerror");


	$method = $_GET['method'];
	$name = $_GET['name'];
	$content = $_GET['content'];
	
	$requestHandler = new RequestHandler();
	$requestHandler->processRequest($method, $name, $content);
?>
