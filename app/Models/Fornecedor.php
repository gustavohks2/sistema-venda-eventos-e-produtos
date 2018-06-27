<?php
namespace App\Models;

use Core\BaseModel;

class Fornecedor extends BaseModel {
   
    protected $tabela = "endereco";
    protected $tabela2 = "fornecedor";
    public static $tiposStatus = ["ativo", "bloqueado"];

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

    public function getFornecedorById($id){
        $where = " e INNER JOIN fornecedor f ON f.fkEndereco = e.idEndereco WHERE f.idFornecedor = $id";
        return ($produto = $this->readKey("*", $where)) ? $produto : FALSE;
    }
    
    public function atualizar($dados){
        $array = array(
            array(
                "numero" => $dados->numero, "cep" => $dados->cep, "endereco" => $dados->endereco, 
                "complemento" => $dados->complemento, "bairro" => $dados->bairro, "uf" => $dados->uf, 
                "cidade" => $dados->cidade, "logradouro" => $dados->logradouro
            ),
            array(
                "nome" => $dados->nome, "telefone" => $dados->telefone, "email" => $dados->email,
                "inscricaoEstadual" => $dados->inscricaoEstadual
            )
        );

        return $this->updateWithChildRows($array, [
                    "idEndereco" => $dados->idEndereco,
                    "idFornecedor" => $dados->idFornecedor
               ]) ? TRUE : FALSE;    
    }

    public function bloquear($id){
        $array = [ "status" => 1, "dataBloqueioFornecedor" => date("Y-m-d") ];
        
        return $this->update($array, " idFornecedor = $id", "fornecedor");
    }

    public function desbloquear($id){
        $array = [ "status" => 0, "dataBloqueioFornecedor" => date("Y-m-d", strtotime("11-11-1111")) ];
        
        return $this->update($array, " idFornecedor = $id", "fornecedor");
    }
    
    public function excluir($id){
        $where = "	idFornecedor = $id";
        return ($produto = $this->delete($where)) ? $produto : FALSE;
    }

}
