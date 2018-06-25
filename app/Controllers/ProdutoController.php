<?php
namespace App\Controllers;

use Core\Session;
use Core\BaseController;
use App\Models\Produto;
use App\Models\Fornecedor;

class ProdutoController extends BaseController {

    protected $tabela = "produto";

    public function index() {
        $this->setPageTitle('Produto');
        $this->Render('produto/cadastro', 'layoutHome');
    }

    public function cadastro() {
        $this->setPageTitle("Cadastro Produtos");
        $this->Render("produto/cadastro", "layoutAdmin");
    }
    
    public function cadastrar($request) {
        $dados = $request->post;
        $files = $request->files;

        $produto = new Produto();

        if ($produto->cadastrar($dados, $files)) 
            $this->redirect("admin/produtos", self::SUCCESS, "Cadastrado com sucesso!");

        $this->redirect("admin/produtos", self::DANGER, "OPS, algo deu errado!");
    }
    
    public function cadastrarEditar($request) {        
        $id = $request->get->id;
        $produto = new Produto();
        //essa só foi uma forma para demonstra como trazer dados de outra tabela pela chave estrangeira
        //aqui poderia so te usado o o metodo listar
        $this->setPageTitle("Admin - Editar Fornecedor");
        $this->view->produto = $produto->getProdutoById( $id );

        $fornecedor = new Fornecedor;
        $this->view->fornecedores = $fornecedor->listar();

        $this->Render("produto/editarProduto", "layoutAdmin");
    }
    
    public function cadastrarEditarSalvar($request) {        
        $dados = $request->post;
        $produto = new Produto();
        if($produto->atualizar($dados)){
        $this->redirect("admin/produtos", self::SUCCESS, "Editado com sucesso!");
        }else{
           $this->redirect("admin/produtos", self::DANGER, "OPS, algo deu errado!");
        }
    }
    
    public function produtoExcluir($request) {
        
        $id = $request->get->id;
        $produto = new Produto();
        if ($produto->excluir($id)){ 
            $this->redirect("admin/produtos", self::SUCCESS, "Excluido com sucesso!");
        } else {
        $this->redirect("admin/produtos", self::DANGER, "OPS, algo deu errado!");
        }
    }
}