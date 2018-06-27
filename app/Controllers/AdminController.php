<?php

namespace App\Controllers;
use Core\BaseController;
use App\Models\Produto;
use App\Models\Fornecedor;
class AdminController extends BaseController{

    public function index(){
        if ($this->session->nivel !== "2")
            $this->redirect("", self::WARNING, "Você não tem permissão para acessar a página!");

        $this->setPageTitle("Admin");
        $this->Render('admin/index', 'layoutAdmin');
    }

    public function manterProdutos() {
        if ($this->session->nivel !== "2")
            $this->redirect("", self::WARNING, "Você não tem permissão para acessar a página!");

        $produto = new Produto;
        $this->view->produtos = $produto->listar();

        $this->setPageTitle("Admin - Produtos");
        $this->Render('admin/produtos', 'layoutAdmin');
    }

    public function manterFornecedores() {
        if ($this->session->nivel !== "2")
            $this->redirect("", self::WARNING, "Você não tem permissão para acessar a página!");

        $fornecedor = new Fornecedor;
        $this->view->fornecedor = $fornecedor;
        $this->view->fornecedores = $fornecedor->listar();

        $this->setPageTitle("Admin - Fornecedores");
        $this->Render('admin/fornecedores', 'layoutAdmin');
    }

    public function cadastroFornecedor() {
        if ($this->session->nivel !== "2")
            $this->redirect("", self::WARNING, "Você não tem permissão para acessar a página!");

        $this->setPageTitle("Admin - Cadastro Fornecedor");
        $this->Render("fornecedor/cadastro", "layoutAdmin");
    }

    public function cadastroProduto() {
        if ($this->session->nivel !== "2")
            $this->redirect("", self::WARNING, "Você não tem permissão para acessar a página!");

        $fornecedor = new Fornecedor;

        $this->view->fornecedores = $fornecedor->listar();
        $this->setPageTitle("Admin - Cadastro Produto");
        $this->Render("produto/cadastro", "layoutAdmin");
    }
}