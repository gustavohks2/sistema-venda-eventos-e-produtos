<?php

namespace App\Controllers;
use Core\BaseController;

class HomeController extends BaseController{
   
    public function index(){
        $this->view->nome = 'wesllen';
        $this->Render('home/index');
//        require_once __DIR__.'/../Views/home/index.phtml';
    }
    
    public function login(){
        echo 'login';
    }
    
    public function validarLogin($id, $request){
        echo  $id . '<br>';
        echo $request->get->nome;
        
    }
}
