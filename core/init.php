<?php
    $root = $_SERVER['DOCUMENT_ROOT'].'/erp-php/';
	$roothost = "https://localhost/erp-php/";
    $webname = "Stan Consulting Group ERP";

	session_start();

	$GLOBALS['config']= array(
		'mysql' => array(
			'host' => '127.0.0.1',
			'username' => 'root',
			'password' => '',
			'db' => 'erp'
		),
		'session' => array(
			'token_name' => 'token'
		)
	);

	spl_autoload_register(function($class) {
		require_once ($_SERVER['DOCUMENT_ROOT'].'/erp-php/classes/' . $class . '.php');
	});

	require_once ($_SERVER['DOCUMENT_ROOT'].'/erp-php/functions/sanitize.php');

?>