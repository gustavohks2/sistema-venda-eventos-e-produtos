<?php
namespace App\Models;

use Core\BaseModel;
use Mpdf\Mpdf;

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

    public function listar() {
        $where = "e JOIN pessoa p ON p.fkEndereco = e.idEndereco JOIN certificadosemitidos c ON c.fkPessoa_aluno = p.idPessoa where c.idCertificado";
        return ($certificados = $this->readKey("*", $where)) ? $certificados : FALSE;
    }

    public function getCertificadoById($id) {
        $where = "e JOIN pessoa p ON p.fkEndereco = e.idEndereco JOIN certificadosemitidos c ON c.fkPessoa_aluno = p.idPessoa where c.idCertificado = $id";
        return ($certificado = $this->readKey("*", $where)) ? $certificado : FALSE;
    }

    public function gerarCertificado($idCertificado) {
        try {
            if ($certificado = $this->getCertificadoById($idCertificado)[0]) {
                $file = file_get_contents(__DIR__ . '/../Views/template/template-certificado.html', FILE_USE_INCLUDE_PATH);

                $firstName = trim(explode(" ", $certificado->nome)[0]);
                $certificado->dataInicio = date("d/m/Y", strtotime($certificado->dataInicio));
                $certificado->dataFim = date("d/m/Y", strtotime($certificado->dataFim));

                $search = ["{{nome}}", "{{cargaHoraria}}", "{{dataInicio}}", "{{dataFim}}"];
                $replace = [$certificado->nome, $certificado->cargaHoraria, $certificado->dataInicio, $certificado->dataFim];
                $file = str_replace($search, $replace, $file);
                
                $mpdf = new Mpdf([
                    "orientation" => "L",
                    "margin_left" => 0,
                    "margin_right" => 0,
                    "margin_top" => 0,
                    "margin_bottom" => 0
                ]);
        
                $mpdf->WriteHTML($file);
                $mpdf->Output();
                return TRUE;
            }
            
            return FALSE;
        } catch(Exception $e) {
            echo "Não foi possível gerar o arquivo PDF, por favor, contate o Administrador<br>";
            echo "Mensagem de Erro: " . $e->getMessage();
        }
    }

    public function atualizar($dados){
        $array = array(
            array(
                "numero" => $dados->numero, "cep" => $dados->cep, "endereco" => $dados->endereco, 
                "complemento" => $dados->complemento, "bairro" => $dados->bairro, "uf" => $dados->uf, 
                "cidade" => $dados->cidade, "logradouro" => $dados->logradouro
            ),
            array(
                "nome" => $dados->nome, "cpf" => $dados->cpf, "rg" => $dados->rg, "telefoneContato" => $dados->telefone,
                "email" => $dados->email,
            ),
            array(
                "dataInicio" => $dados->dataInicio, "dataFim" => $dados->dataFim, "cargaHoraria" => $dados->cargaHoraria,
                "responsavel" => $dados->responsavel
            )
        );

        return $this->updateWithChildRows($array, [
                    "idEndereco" => $dados->idEndereco,
                    "idPessoa" => $dados->idPessoa,
                    "idCertificado" => $dados->idCertificado
               ]) ? TRUE : FALSE;    
    }
}
