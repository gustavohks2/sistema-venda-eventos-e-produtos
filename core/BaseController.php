<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core;

use Core\Session;
use Core\FlashMessage;
/**
 * Description of BaseController
 *
 * @author Wesllen
 */
class BaseController {

    protected $view;
    private $viewPath;
    private $layoutPath;
    private $pageTitle;
    private $redirect;
    private $tipo;
    private $extencao;
    private $mensagem;

    # Enumerados
    const SUCCESS = 1;
    const INFO = 2;
    const WARNING = 3;
    const DANGER = 4;

    public function __construct() {
        $this->view = new \stdClass();
    }

    /*Ecolhe qual qual o caminho que sera achado a o arquivo da view
     * Se existe um tanplate base seta ele @param $layoutPath
     * Se existe alguma extenção diferente da default .phtml seta ela no @param $extencao
     */
    protected function Render($view, $layoutPath = null, $extencao = null) {
        $this->viewPath = $view;
        $this->layoutPath = $layoutPath;
        $this->extencao = $extencao;
        //Se existir layout passa o caminho dele caso contrario passa so o caminho do arquivo da view
        if ($layoutPath) {
            $this->layout();
        } else {
            $this->content();
        }
    }

    protected function content() {
        $ext = empty($this->extencao) ? ".phtml" : ".". $this->extencao;
        if (file_exists(__DIR__ . "/../app/Views/{$this->viewPath}{$ext}")) {
            require_once __DIR__ . "/../app/Views/{$this->viewPath}{$ext}";
        } else {
            Container::pageNotFoundView();
        }
    }

    protected function layout() {
        if (file_exists(__DIR__ . "/../app/Views/template/{$this->layoutPath}.phtml")) {
            require_once __DIR__ . "/../app/Views/template/{$this->layoutPath}.phtml";
        } else {
            Container::pageNotFoundLayout();
        }
    }

    protected function setPageTitle($pageTitle) {
        $this->pageTitle = $pageTitle;
    }

    protected function getPageTitle($separator = null) {
        if ($separator) {
            echo $this->pageTitle . " " . $separator . " ";
        } else {
            echo $this->pageTitle;
        }
    }

    protected function redirect($redirect, $tipo = null, $mensagem = null) {
        $this->redirect = $redirect;
        $this->setSessionMessage();
        $this->getRedirect() === TRUE ?: Container::pageNotFoundLayout();
    }

    protected function setSessionMessage($tipo, $mensagem) {
        $this->tipo = $tipo;
        $this->mensagem = $mensagem;
        $this->setSession();
    }

    protected function getRedirect() {
        header('Location:' . base_url('/') . '' . $this->redirect);
        return TRUE;
    }

    protected function setSession() {
      $data = Session::getInstance();
      //fornece qual sera o nome da sessao e sua mensagem
      switch ($this->tipo) {
          case 1: $data->success = $this->mensagem;
              break;
          case 2: $data->info = $this->mensagem;
              break;
          case 3: $data->warning = $this->mensagem;
              break;
          case 4: $data->danger = $this->mensagem;
              break;
      }
    }

    protected function displayMessage(bool $isModal = false) {
      if (gettype($isModal) !== "boolean") 
         throw new Exception("O argumento \$isModal deve ser do tipo lógico booleano.");
         
      FlashMessage::show($isModal);
    }
}   
