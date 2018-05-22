<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Models;
use Core\BaseModel;
use Core\Session;
/**
 * Description of Login
 *
 * @author Wesllen
 */
class Login extends BaseModel {
    protected $tabela = "usuario";
    
    public function verificarlogin($dados){
        $senha = md5($dados->password);
        $verificar = $this->read("*", "login = '{$dados->usuario}' and senha = '{$senha}';");
        if (count($verificar) > 0) {
            $login = $verificar[0]->login;
            $id = $verificar[0]->idusuario;
           
            
            $data = Session::getInstance();
            $data->authenticado = TRUE;
            $data->login = $login;
            $data->id = $id;         
            return TRUE;
        }
        return FALSE;
    }
    
}
