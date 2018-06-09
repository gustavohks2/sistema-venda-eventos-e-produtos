<?php
namespace App\Models;

use Core\BaseModel;

class Fornecedor extends BaseModel {
   
    protected $tabela = "endereco";
    protected $tabela2 = "fornecedor";

    protected $tabelaUse = 2;

    protected $chaveEstrangeira = "fkEndereco";

    public function cadastrar($fornecedor) {
        $array = array(
            "0" => array(
               "cep" => $fornecedor->cep, "endereco" => $fornecedor->endereco, "complemento" => $fornecedor->complemento,
               "numero" => $fornecedor->numero, "bairro" => $fornecedor->bairro, "cidade" => $fornecedor->cidade,
               "uf" => $fornecedor->uf, "logradouro" => $fornecedor->logradouro
            ),
            "1" => array(
               "nome" => $fornecedor->nome, "telefone" => $fornecedor->telefone, "email" => $fornecedor->email,
               "razaoSocial" => $fornecedor->razaoSocial, "status" => "0", "dataBloqueioFornecedor" => "1920-01-01",
               "inscricaoEstadual" => $fornecedor->inscricaoEstadual
           )
        );

        if ($this->insert($array)) return TRUE;
        return FALSE;
    }

    public function listar() {
        return ($fornecedores = $this->read("*")) ? $fornecedores : FALSE;
    }

}
