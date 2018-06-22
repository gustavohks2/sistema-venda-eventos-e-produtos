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

$routes[] = ['/admin/cadastro/produto', 'AdminController@cadastroProduto'];
$routes[] = ['/produto/cadastrar', 'ProdutoController@cadastrar'];
$routes[] = ['/produto/editar', 'ProdutoController@cadastrarEditar'];
$routes[] = ['/produto/excluir', 'ProdutoController@produtoExcluir'];
$routes[] = ['/produto/editar/salvar', 'ProdutoController@cadastrarEditarSalvar'];

$routes[] = ['/admin/cadastro/fornecedor', 'AdminController@cadastroFornecedor'];
$routes[] = ['/fornecedor/cadastrar', 'FornecedorController@cadastrar'];
$routes[] = ['/fornecedor', 'FornecedorController@index'];
$routes[] = ['/fornecedor/editar', 'FornecedorController@Editar'];
$routes[] = ['/fornecedor/excluir', 'FornecedorController@Excluir'];
$routes[] = ['/fornecedor/editar/salvar', 'FornecedorController@EditarSalvar'];

return $routes;

