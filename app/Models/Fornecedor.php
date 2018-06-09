<?php
namespace App\Models;

use Core\BaseModel;

class Fornecedor extends BaseModel {
   
    protected $tabela = "endereco";
    protected $tabela2 = "fornecedor";

    protected $tabelaUse = 2;

    protected $chaveEstrangeira = "fkEndereco";

    public function cadastrar($dados) {

        $array = array(
            "0" => array(
               "cep" => "109381023", "endereco" => "Nenhum", "complemento" => "Nenhum",
               "numero" => "123 AV", "bairro" => "Rec", "cidade" => "Rec",
               "uf" => "DF", "logradouro" => "Teste"
            ),
            "1" => array(
               "nome" => "Leite condensado", "telefone" => "1209381039", "email" => "forn@mail.com",
               "razaoSocial" => "Fornec Ações", "status" => "1", "dataBloqueioFornecedor" => "2018-11-02",
               "inscricaoEstadual" => "1093810293"
           )
        );

        if ($this->insert($array)) return TRUE;
        return FALSE;
    }

    public function listar() {
        if ($fornecedores = $this->read("*")) 
            return $fornecedores;
        return FALSE;
    }

}
