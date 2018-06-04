<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;
use Core\BaseController;

class AdminController extends BaseController{
    
    public function index(){
        if ($this->session->nivel !== "2")
            $this->redirect("", self::WARNING, "Você não tem permissão para acessar a página!");
        $this->setPageTitle("Admin");
        $this->Render('admin/index', 'layoutAdmin');
    }
}
