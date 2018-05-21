<?php

namespace App\Controllers;
use Core\BaseController;
use App\Models\Login;


class HomeController extends BaseController{
   
    public function index(){
        //$this->setPageTitle("Home");
        //$this->view->nome = 'wesllen';
        $login = new Login();
        $r = $login->readall();
        print_r($r);
        
        //$this->Render('home/index', 'layoutHome');

    }
    
    public function login(){
        echo 'login';
    }
    
    public function validarLogin($id, $request){
        echo  $id . '<br>';
        echo $request->get->nome;
        
    }
    
    public function cadastros(){
        $login = new Login();
        $login->readAll();
        var_dump($login);
    }
}
