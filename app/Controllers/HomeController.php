<?php

namespace App\Controllers;
use Core\BaseController;
use App\Models\Login;
use App\Models\Cadastro;
use Core\Session;


class HomeController extends BaseController {
   
    public function index(){
        //seta o titulo da pagina
        $this->setPageTitle("Home");
        //renderiza a pagina e o layout
        $this->Render('home/index', 'layoutHome');

    }
    
    public function validarLogin($request){
        $login = new Login();
        //verifica se existe o usuario digitado se sim retorna TRUE
        if($login->verificarlogin($request->post)){
            //se existe usuario chama o metodo que redireciona para a pagina especificada
            $this->redirect("admin");
        }else{
            //estancia a o metodo que cria a sessao
            $data = Session::getInstance();
            //fornece qual sera o nome da sessao e sua mensagem
            $data->erro = "Usuário inválido";
            //chama a função que redireciona para a pagina especificada
            $this->redirect("login");
        }
        
        
    }
    
    public function cadastro(){
        //seta o titulo da pagina 
        $this->setPageTitle('Cadastrar');
        //renderiza a pagina
        $this->Render('home/cadastro', 'layoutHome');
    }
    public function cadastroCreat($request){
        //traz todos as request post enviadas
        $dados = $request->post;
        //instacia o objeto da model Cadastro
        $cadastro = new Cadastro();
        //verifica se foi cadastrado com sucesso retorna TRUE
        if($cadastro->cadastrar($dados)){
            //Apresenta a mensagem de cadastro efetuado com sucesso
            echo 'Cadastrado com Sucesso';
        }else{
            //Apresenta a mensagem de erro ao tentar cadastrar
            echo 'OPS algo deu errado no seu cadastro';
        }
    }
}
