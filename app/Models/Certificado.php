<?php
namespace App\Models;

use Core\BaseModel;

class Certificado extends BaseModel {
   
    protected $tabela = "endereco";
    protected $tabela2 = "pessoa";
    protected $tabela3 = "certificadosemitidos";

    protected $tabelaUse = 3;

    protected $chaveEstrangeira = "fkEndereco";
    protected $chaveEstrangeira1 = "fkPessoa_aluno";

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
                "dataInicio" => $dados->dataInicio, "dataFim" => $dados->dataFim, "cargaHoraria" => $dados->cargaHoraria,
                "responsavel" => $dados->responsavel
            )
        );

        return $this->insert($array) ? TRUE : FALSE;
    }
}
