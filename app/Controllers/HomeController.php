<?php

namespace App\Controllers;
use Core\BaseController;

class HomeController extends BaseController {
   
    public function index(){
        $this->view->nome = 'wesllen';
        $this->Render('home/index');
    }
    
    public function login(){
        echo 'login';
    }
    
    public function validarLogin($id, $request){
        echo  $id . '<br>';
        echo $request->get->nome;
        
    }
}
