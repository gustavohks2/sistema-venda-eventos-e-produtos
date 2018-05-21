<?php

$routes[] = ['/', 'HomeController@index'];
$routes[] = ['/login', 'HomeController@login'];
$routes[] = ['/login/{id}/show', 'HomeController@validarLogin'];
$routes[] = ['/cadastro', 'HomeController@cadastro'];
$routes[] = ['/cadastro/create', 'HomeController@cadastroCreat'];
$routes[] = ['/admin', 'AdminController@index'];

return $routes;

