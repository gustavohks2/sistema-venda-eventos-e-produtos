<?php
namespace App\Controllers;

use Core\Session;
use Core\BaseController;
use App\Models\Produto;

class ProdutoController extends BaseController {

    public function index() {
        $this->setPageTitle('Produto');
        //renderiza a pagina
        $this->Render('produto/cadastro', 'layoutHome');
    }
    
    public function cadastrar($request) {
        $produto = new Produto();

        if ($produto->cadastrar("")) {
            $this->redirect("produto", self::SUCCESS, "Cadastrado com sucesso!");
        } else {
            $this->redirect("produto", self::DANGER, "OPS, algo deu errado!");
        }
    }
}