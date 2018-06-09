<?php

$routes[] = ['/', 'HomeController@index'];
$routes[] = ['/index', 'HomeController@index'];
$routes[] = ['/login/verificar', 'HomeController@validarLogin'];
$routes[] = ['/login/sair', 'HomeController@logout'];
$routes[] = ['/cadastro', 'HomeController@cadastro'];
$routes[] = ['/usuario/cadastrar', 'HomeController@cadastrar'];

$routes[] = ['/admin', 'AdminController@index'];
$routes[] = ['/admin/produtos', 'AdminController@manterProdutos'];
$routes[] = ['/admin/fornecedores', 'AdminController@manterFornecedores'];

$routes[] = ['/admin/produto/cadastro', 'ProdutoController@cadastro'];
$routes[] = ['/produto/cadastrar', 'ProdutoController@cadastrar'];

$routes[] = ['/admin/fornecedor/cadastro', 'AdminController@cadastroFornecedor'];
$routes[] = ['/fornecedor/cadastrar', 'FornecedorController@cadastrar'];
$routes[] = ['/fornecedor', 'FornecedorController@index'];

return $routes;

