<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Core\BaseModel;

/**
 * Description of Cadastro
 *
 * @author laboratorio
 */
class Cadastro extends BaseModel {
    //definir os nomes da tabelas maximo de 4
    protected $tabela = "endereco";
    protected $tabela2 = "pessoa";
    protected $tabela3 = "usuario";
    //Definir a quantidade de tabelas que serao usadas maximo de 4
    protected $tabelaUse = 3;
    //definir os nomes das chaves estrangeiras maximo de 3
    protected $chaveEstrangeira = "fkEndereco";
    protected $chaveEstrangeira1 = "fkPessoa";

    public function cadastrar($dados) {

        $array = array(
            "0" =>
            array(
                "cep" => $dados->cep, "endereco" => $dados->endereco, "complemento" => $dados->complemento,
                "numero" => $dados->numero, "bairro" => $dados->bairro, "cidade" => $dados->cidade,
                "uf" => $dados->uf, "logradouro" => $dados->logradouro
            ),
            "1" =>
            array(
                "nome" => $dados->nome, "cpf" => $dados->cpf, "rg" => $dados->rg, "telefoneContato" => $dados->telefone,
                "email" => $dados->email,
            ),
            "2" =>
            array(
                "login" => $dados->login, "senha" => md5($dados->senha), "nivel" => "1"
            )
        );


        if ($this->insert($array)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
