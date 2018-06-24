<?php

namespace App\Controllers;

use Core\BaseController;
use App\Models\Certificado;

class CertificadoController extends BaseController {

   protected $tabela = "certificadosEmitidos";

   public function index() {
      $this->setPageTitle("Admin - Certificados");
      $this->Render("certificado/index", "layoutAdmin");
   }

   public function cadastro() {
      $this->setPageTitle("Admin - Certificados");
      $this->Render("certificado/cadastro", "layoutAdmin");
   }

   public function cadastrar($request) {
      $dados = $request->post;
      $certificado = new Certificado;
      $certificado->cadastrar($dados);
   }
}