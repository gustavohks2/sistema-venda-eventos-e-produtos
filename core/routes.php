<?php

$routes[] = ['/', 'HomeController@index'];
$routes[] = ['/index', 'HomeController@index'];
$routes[] = ['/login/verificar', 'HomeController@validarLogin'];
$routes[] = ['/login/sair', 'HomeController@logout'];
$routes[] = ['/cadastro', 'HomeController@cadastro'];
$routes[] = ['/usuario/cadastrar', 'HomeController@cadastrar'];

$routes[] = ['/admin', 'AdminController@index'];
$routes[] = ['/admin/produtos', 'AdminController@manterProdutos'];

$routes[] = ['/produto', 'ProdutoController@cadastro'];
$routes[] = ['/produto/cadastrar', 'ProdutoController@cadastrar'];

return $routes;

