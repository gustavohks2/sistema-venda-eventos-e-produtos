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
        //essa só foi uma forma para demonstra como trazer dados de outra tabela pela chave estrangeira
        //aqui poderia so te usado o o metodo listar
        $this->view->ListarProduto = $produto->listraOneChave(
            "p JOIN fornecedor f ON p.fkFornecedor = f.idFornecedor  where p.idProduto = $id"
        );
        

        $this->view->fornecedores = $fornecedor->listar();

        $this->Render("produto/editarProduto", "layoutAdmin");
    }
    
    public function EditarSalvar($request) {        
        $dados = $request->post;
        
        $fornecedor = new Fornecedor();
        
        if($produto->atualizar($dados)){
        $this->redirect("admin/produtos", self::SUCCESS, "Editado com sucesso!");
        }else{
           $this->redirect("admin/produtos", self::DANGER, "OPS, algo deu errado!");
        }
    }
    
    public function Excluir($request) {
        
        $id = $request->get->id;
        $produto = new Produto();
        if ($produto->excluir($id)){ 
            $this->redirect("admin/produtos", self::SUCCESS, "Excluido com sucesso!");
        } else {
        $this->redirect("admin/produtos", self::DANGER, "OPS, algo deu errado!");
        }
    }

    
}