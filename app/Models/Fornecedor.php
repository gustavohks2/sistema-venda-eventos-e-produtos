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
    
    public function atualizar($dados){
        $array = array(
                "nome_produto" => $dados->nome, "fabricante" => $dados->fabricante, "peso" => $dados->peso,
                "descricao" => $dados->descricao, "valorVenda" => $dados->valorVenda, "valorComprado" => $dados->valorComprado,
                "dataValidade" => $dados->dataValidade, "fkFornecedor" => $dados->fornecedor
        );
        $where = "	idFornecedor = $dados->idProduto";
        return ($produtos = $this->update($array, $where)) ? $produtos : FALSE;
        
    }
    
    public function excluir($id){
        $where = "	idFornecedor = $id";
        return ($produto = $this->delete($where)) ? $produto : FALSE;
    }

}
