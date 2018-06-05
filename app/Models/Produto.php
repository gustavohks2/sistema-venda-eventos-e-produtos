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
                "nome" => "Leite condensado", "fabricante" => "Itambé", "peso" => "3.55",
                "descricao" => "Nenhuma", "valorVenda" => "3.99", "valorComprado" => "1.99",
                "dataValidade" => "1999-10-02", "fkFornecedor" => "1"
            )
        );

        if ($this->insert($array)) return TRUE;
        return FALSE;
    }

}
