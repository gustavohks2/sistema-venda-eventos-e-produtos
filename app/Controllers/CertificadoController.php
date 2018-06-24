<?php

namespace App\Controllers;

use Core\BaseController;
use App\Models\Certificado;

class CertificadoController extends BaseController {

   protected $tabela = "certificadosEmitidos";

   public function index() {
      $certificado = new Certificado;

      $this->view->certificados = $certificado->listar();

      $this->setPageTitle("Admin - Certificados");
      $this->Render("certificado/index", "layoutAdmin");
   }

   public function gerarPDF($id) {
      $certificado = new Certificado;
      
      if (!$certificado->gerarCertificado($id)) 
         $this->redirect("admin/certificados", self::DANGER, "Erro ao gerar PDF!");
   }

   public function cadastro() {
      $this->setPageTitle("Admin - Certificados");
      $this->Render("certificado/cadastro", "layoutAdmin");
   }

   public function cadastrar($request) {
      $dados = $request->post;
      $certificado = new Certificado;

      if ($certificado->cadastrar($dados)) $this->redirect("admin/certificados", self::SUCCESS, "Certificado registrado com sucesso!");
      else $this->redirect("admin/certificados", self::DANGER, "Erro ao registrar dados do certificado!");
   }
}