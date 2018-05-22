<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__."/helpers.php";
$routes = require_once __DIR__. "/routes.php";
$route = new \Core\Route($routes);

