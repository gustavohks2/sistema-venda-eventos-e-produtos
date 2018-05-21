<?php
require_once __DIR__.'/../vendor/autoload.php';
$routes = require_once __DIR__. "/../app/Route/routes.php";
$route = new \Core\Route($routes);

