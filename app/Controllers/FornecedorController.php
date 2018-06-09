<?php
namespace App\Controllers;

use Core\BaseController;
use App\Models\Fornecedor;

class FornecedorController extends BaseController {

    protected $tabela = "fornecedor";

    public function index() {
        
    }

    public function cadastrar($request) {
        $dados = $request->post;

        $fornecedor = new Fornecedor();

        if ($fornecedor->cadastrar($dados)) $this->redirect("admin/fornecedores", self::SUCCESS, "Fornecedor cadastrado com sucesso!");
        else $this->redirect("fornecedor", self::DANGER, "OPS! Algo deu errado! :/");
    }

    
}