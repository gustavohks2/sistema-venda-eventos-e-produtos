<?php
namespace App\Controllers;

use Core\Session;
use Core\BaseController;
use App\Models\Produto;

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

        $produto = new Produto();

        if ($produto->cadastrar($dados)) 
            $this->redirect("admin/produtos", self::SUCCESS, "Cadastrado com sucesso!");

        $this->redirect("admin/produtos", self::DANGER, "OPS, algo deu errado!");
    }
}