<?php

namespace App\Controllers;

use Core\BaseController;
use App\Models\Login;
use App\Models\Cadastro;


class HomeController extends BaseController {

    public function index() {
        //seta o titulo da pagina
        $this->setPageTitle("Home");
        //renderiza a pagina e o layout
        $this->Render('home/index', 'layoutHome');
    }

//
//    public function login() {
//        //seta o titulo da pagina
//        $this->setPageTitle("Login");
//        //renderiza a pagina e o layout
//        $this->Render("home/login", 'layoutHome');
//    }

    public function validarLogin($request) {

        $login = new Login();


        if ($login->isNull($request->post) === FALSE) {
            //verifica se existe o usuario digitado, se sim retorna TRUE
            if ($login->verificarlogin($request->post)) {
                //se existe usuario chama o metodo que redireciona para a pagina especificada
                $this->redirect("admin");
            } else {
        /*  1: success               
            2: info                
            3: warning 
            4: danger
          */
                //Seto a pagina que vai ser redirecionada e se eu quizer passo uma menssagem via session
                $this->redirect("index", "4", "Usuário Inválido");
            }
        } else {
            //Seto a pagina que vai ser redirecionada e se eu quizer passo uma menssagem via session
            $this->redirect("index", "2", "Por favor, preencha todos os campos");
        }
    }

    public function cadastro() {
        //seta o titulo da pagina 
        $this->setPageTitle('Cadastrar');
        //renderiza a pagina
        $this->Render('home/cadastro', 'layoutHome');
    }

    public function cadastroCreat($request) {
        //traz todos as request post enviadas
        $dados = $request->post;
        //instacia o objeto da model Cadastro
        $cadastro = new Cadastro();
        //verifica se foi cadastrado com sucesso retorna TRUE
        if ($cadastro->cadastrar($dados)) {
            //Apresenta a mensagem de cadastro efetuado com sucesso
            echo 'Cadastrado com Sucesso';
        } else {
        /*  1: success               
            2: info                
            3: warning 
            4: danger
          */
            //Apresenta a mensagem de erro ao tentar cadastrar
            $this->redirect("cadastro", "4", "OPS algo deu errado no seu cadastro");
            
        }
    }

}
