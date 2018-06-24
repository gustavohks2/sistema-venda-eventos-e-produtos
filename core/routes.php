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
$routes[] = ['/admin/produto/editar', 'ProdutoController@cadastrarEditar'];
$routes[] = ['/admin/produto/excluir', 'ProdutoController@produtoExcluir'];
$routes[] = ['/produto/editar/salvar', 'ProdutoController@cadastrarEditarSalvar'];

$routes[] = ['/admin/cadastro/fornecedor', 'AdminController@cadastroFornecedor'];
$routes[] = ['/fornecedor/cadastrar', 'FornecedorController@cadastrar'];
$routes[] = ['/fornecedor', 'FornecedorController@index'];
$routes[] = ['/admin/fornecedor/editar', 'FornecedorController@Editar'];
$routes[] = ['/admin/fornecedor/excluir', 'FornecedorController@Excluir'];
$routes[] = ['/fornecedor/editar/salvar', 'FornecedorController@EditarSalvar'];

$routes[] = ['/admin/certificados', 'CertificadoController@index'];
$routes[] = ['/admin/certificado/cadastro', 'CertificadoController@cadastro'];
$routes[] = ['/certificado/cadastrar', 'CertificadoController@cadastrar'];

return $routes;

