<?php

namespace App\Controllers;
use Core\BaseController;
use App\Models\Login;
use App\Models\Cadastro;


class HomeController extends BaseController {
   
    public function index(){
        $this->setPageTitle("Home");              
        $this->Render('home/index', 'layoutHome');

    }
    
    public function login(){
        echo 'login';
        $login = new Login();
        $r = $login->readall();
        print_r($r);
    }
    
    public function validarLogin($id, $request){
        echo  $id . '<br>';
        echo $request->get->nome;
        
    }
    
    public function cadastro(){
        $this->setPageTitle('Cadastrar');
        $this->Render('home/cadastro', 'layoutHome');
    }
    public function cadastroCreat($request){
        $dados = $request->post;
        $cadastro = new Cadastro();
        if($cadastro->cadastrar($dados)){
            echo 'Cadastrado com Sucesso';
        }else{
            echo 'OPS algo deu errado no seu cadastro';
        }
    }
}
