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
                "nome_produto" => $dados->nome, "fabricante" => $dados->fabricante, "peso" => $dados->peso,
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
    
    public function listOneKey($where){
        return ($produto = $this->readKey("*", $where)) ? $produto : FALSE;
    }
    
    public function atualizar($dados){
        $array = array(
                "nome_produto" => $dados->nome, "fabricante" => $dados->fabricante, "peso" => $dados->peso,
                "descricao" => $dados->descricao, "valorVenda" => $dados->valorVenda, "valorComprado" => $dados->valorComprado,
                "dataValidade" => $dados->dataValidade, "fkFornecedor" => $dados->fornecedor
        );
        $where = "idProduto = $dados->idProduto";
        return ($produtos = $this->update($array, $where)) ? $produtos : FALSE;
        
    }
    
    public function excluir($id){
        $where = "idProduto = $id";
        return ($produto = $this->delete($where)) ? $produto : FALSE;
    }

}
