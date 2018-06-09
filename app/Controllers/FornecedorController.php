<?php
namespace App\Controllers;

use Core\BaseController;
use App\Models\Fornecedor;

class FornecedorController extends BaseController {

    protected $tabela = "fornecedor";

    public function index() {
        
    }

    public function cadastrar($request) {
        $fornecedor = new Fornecedor();

        if ($fornecedor->cadastrar("")) {
            $this->redirect("fornecedor", self::SUCCESS, "Cadastrado com sucesso!");
        } else {
            $this->redirect("fornecedor", self::DANGER, "OPS, algo deu errado!");
        }
    }

    
}