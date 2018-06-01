<?php

$routes[] = ['/', 'HomeController@index'];
$routes[] = ['/index', 'HomeController@index'];
$routes[] = ['/login/verificar', 'HomeController@validarLogin'];
$routes[] = ['/login/sair', 'HomeController@logout'];
$routes[] = ['/cadastro', 'HomeController@cadastro'];
$routes[] = ['/cadastro/create', 'HomeController@cadastroCreate'];
$routes[] = ['/admin', 'AdminController@index'];

return $routes;

