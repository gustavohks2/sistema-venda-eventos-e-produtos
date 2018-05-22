<?php

function assets($file){
	$proto = strtolower(preg_replace("/[^a-zA-Z\s]/", '', $_SERVER["SERVER_PROTOCOL"]));


	$serve_name = $_SERVER["SERVER_NAME"];

	$port =$_SERVER["SERVER_PORT"] == "80" ? "" : ":".$_SERVER["SERVER_PORT"];


	$scriptname = str_replace("/index.php", "", $_SERVER["SCRIPT_NAME"]);


	$request_uri = $_SERVER["REQUEST_URI"];

	return "{$proto}://{$serve_name}{$port}{$scriptname}/".ASSETS."{$file}";
        
}

function app($file){
	$proto = strtolower(preg_replace("/[^a-zA-Z\s]/", '', $_SERVER["SERVER_PROTOCOL"]));


	$serve_name = $_SERVER["SERVER_NAME"];

	$port =$_SERVER["SERVER_PORT"] == "80" ? "" : ":".$_SERVER["SERVER_PORT"];


	$scriptname = str_replace("/index.php", "", $_SERVER["SCRIPT_NAME"]);


	$request_uri = $_SERVER["REQUEST_URI"];

	return "{$proto}://{$serve_name}{$port}{$scriptname}/".API."{$file}";
}


function base_url($file){
	$proto = strtolower(preg_replace("/[^a-zA-Z\s]/", '', $_SERVER["SERVER_PROTOCOL"]));


	$serve_name = $_SERVER["SERVER_NAME"];

	$port =$_SERVER["SERVER_PORT"] == "80" ? "" : ":".$_SERVER["SERVER_PORT"];


	$scriptname = str_replace("/index.php", "", $_SERVER["SCRIPT_NAME"]);


	$request_uri = $_SERVER["REQUEST_URI"];

	return "{$proto}://{$serve_name}{$port}{$scriptname}{$file}";
}