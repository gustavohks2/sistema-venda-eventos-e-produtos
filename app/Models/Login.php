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
    
    public function isNull($dados){        
        return ($dados->usuario === "") || ($dados->password === "");
    }
    
    public function verificarlogin($dados){
        $dados->password = md5($dados->password);
        
        $usuario = $this->read("*", "BINARY login = '{$dados->usuario}' and senha = '{$dados->password}'");
        if (count($usuario) > 0) {
            
            $data = Session::getInstance();
            $data->autenticado = TRUE;
            $data->login = $usuario[0]->login;
            $data->nivel = $usuario[0]->nivel;
            $data->id = $usuario[0]->idusuario;         

            return TRUE;
        }

        return FALSE;
    }
    
}
