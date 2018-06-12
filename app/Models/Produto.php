<?php
namespace App\Models;

use Core\BaseModel;

class Produto extends BaseModel {
   
    protected $tabela = "produto";

    protected $tabelaUse = 1;

    public function cadastrar($dados) {

        $array = array(
            "0" =>
            array(
                "nome" => $dados->nome, "fabricante" => $dados->fabricante, "peso" => $dados->peso,
                "descricao" => $dados->descricao, "valorVenda" => $dados->valorVenda, "valorComprado" => $dados->valorComprado,
                "dataValidade" => $dados->dataValidade, "fkFornecedor" => $dados->fornecedor
            )
        );

        if ($this->insert($array)) return TRUE;
        return FALSE;
    }

    public function listar() {
        return ($produtos = $this->read("*")) ? $produtos : FALSE;
    }

}
