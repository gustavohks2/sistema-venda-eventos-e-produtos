<?php

$routes[] = ['/', 'HomeController@index'];
$routes[] = ['/login', 'HomeController@login'];
$routes[] = ['/login/{id}/show', 'HomeController@validarLogin'];

return $routes;

