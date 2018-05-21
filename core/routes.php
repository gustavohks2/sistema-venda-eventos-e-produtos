<?php

$routes[] = ['/', 'HomeController@index'];
$routes[] = ['/index', 'HomeController@index'];
$routes[] = ['/login', 'HomeController@login'];
$routes[] = ['/login/verificar', 'HomeController@validarLogin'];
$routes[] = ['/cadastro', 'HomeController@cadastro'];
$routes[] = ['/cadastro/create', 'HomeController@cadastroCreat'];
$routes[] = ['/admin', 'AdminController@index'];

return $routes;

