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
    
    public function Editar($request) {        
        $id = $request->get->id;
        $fornecedor = new Fornecedor();

        $this->setPageTitle("Admin - Editar Fornecedor");
        $this->view->fornecedor = $fornecedor->getFornecedorById($id)[0];

        $this->Render("fornecedor/editarFornecedor", "layoutAdmin");
    }
    
    public function EditarSalvar($request) {        
        $dados = $request->post;
        
        $fornecedor = new Fornecedor();
        
        if ($fornecedor->atualizar($dados)) $this->redirect("admin/fornecedores", self::SUCCESS, "Editado com sucesso!");
        else $this->redirect("admin/fornecedores", self::DANGER, "OPS, algo deu errado!");
        
    }


    public function bloquear($id) {
        $fornecedor = new Fornecedor();

        if ($fornecedor->bloquear($id)) $this->redirect("admin/fornecedores", self::INFO, "Bloqueado!");
        else $this->redirect("admin/fornecedores", self::DANGER, "OPS, algo deu errado!");
    }    

    public function desbloquear($id) {
        $fornecedor = new Fornecedor();
        
        if ($fornecedor->desbloquear($id)) $this->redirect("admin/fornecedores", self::SUCCESS, "Desloqueado!");
        else $this->redirect("admin/fornecedores", self::DANGER, "OPS, algo deu errado!");
    }   
}