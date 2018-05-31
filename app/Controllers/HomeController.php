<?php
namespace App\Controllers;

use Core\Session;
use Core\BaseController;
use App\Models\Login;
use App\Models\Cadastro;

class HomeController extends BaseController {

    public function index() {
        // Seta o titulo da pagina
        $this->setPageTitle("Home");
        // Renderiza a pagina e o layout
        $this->Render('home/index', 'layoutHome');
    }

    # Responde à requisição post AJAX feita no javascript
    # retornando um formato legível à linguagem front-end (JSON)

    # json_decode(tipoMisto) -> Converte algum dado do PHP em JSON
    public function validarLogin($request) {
        $login = new Login();
        
        if ($login->isNull($request->post) === FALSE) {
            //Verifica se existe o usuário digitado, se sim, retorna TRUE
            if ($login->verificarlogin($request->post)) {
                
                $session = Session::getInstance();
                echo json_encode([
                    "success" => true,
                    "nivel" => $session->nivel
                ]);

            } else {
                
                echo json_encode([
                    "success" => false,
                    "message" => "Usuário Inválido!"
                ]);

            }
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Por favor, preencha todos os campos!"
            ]);
        }
    }

    public function cadastro() {
        //seta o titulo da pagina 
        $this->setPageTitle('Cadastrar');
        //renderiza a pagina
        $this->Render('home/cadastro', 'layoutHome');
    }

    public function cadastroCreate($request) {
        //traz todos as request post enviadas
        $dados = $request->post;
        //instacia o objeto da model Cadastro
        $cadastro = new Cadastro();
        //verifica se foi cadastrado com sucesso retorna TRUE
        if ($cadastro->cadastrar($dados)) {
            //Apresenta a mensagem de cadastro efetuado com sucesso
            echo 'Cadastrado com Sucesso';
        } else {
            //Apresenta a mensagem de erro ao tentar cadastrar
            $this->redirect("cadastro", "4", "OPS algo deu errado no seu cadastro");
            
        }
    }

}