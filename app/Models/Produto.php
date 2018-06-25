<?php
namespace App\Models;

use Core\BaseModel;

class Produto extends BaseModel {
   
    protected $tabela = "produto";

    protected $tabelaUse = 1;

    public function cadastrar($dados, $files) {
        if($nomeImagem = $this->uploadImage($files->imagem)) {
            $array = array(
                "0" =>
                array(
                    "nome" => $dados->nome, "fabricante" => $dados->fabricante, "peso" => $dados->peso,
                    "descricao" => $dados->descricao, "valorVenda" => $dados->valorVenda, "valorComprado" => $dados->valorComprado,
                    "dataValidade" => $dados->dataValidade, "tipoVisibilidade" => $dados->tipoVisibilidade, "imagem" => $nomeImagem, "fkFornecedor" => $dados->fornecedor
                )
            );
    
            if ($this->insert($array)) return TRUE;
        }
        return FALSE;
    }

    public function listar() {
        return ($produtos = $this->read("*")) ? $produtos : FALSE;
    }
    
    public function getProdutoById($id){
        $where = "p JOIN fornecedor f ON p.fkFornecedor = f.idFornecedor  where p.idProduto = $id";
        return ($produto = $this->readKey("*, p.nome AS nomeProduto", $where)) ? $produto : FALSE;
    }
    
    public function atualizar($dados){
        $array = array(
                "nome" => $dados->nome, "fabricante" => $dados->fabricante, "peso" => $dados->peso,
                "descricao" => $dados->descricao, "valorVenda" => $dados->valorVenda, "valorComprado" => $dados->valorComprado,
                "dataValidade" => $dados->dataValidade, "fkFornecedor" => $dados->fornecedor
        );
        $where = "idProduto = $dados->idProduto";
        return $this->update($array, $where) ? TRUE : FALSE;
        
    }
    
    public function excluir($id){
        $where = "idProduto = $id";
        return ($produto = $this->delete($where)) ? $produto : FALSE;
    }

}
