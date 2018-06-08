<?php

namespace App\Controllers;
use Core\BaseController;
use App\Models\Produto;
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
}