<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core;

use Core\Session;

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
    private $erro;

    public function __construct() {
        $this->view = new \stdClass();
    }

    protected function Render($view, $layoutPath = null) {
        $this->viewPath = $view;
        $this->layoutPath = $layoutPath;

        //Se existir layout passa o caminho dele caso contrario passa so o caminho do arquivo da view
        if ($layoutPath) {
            $this->layout();
        } else {
            $this->content();
        }
    }

    protected function content() {
        if (file_exists(__DIR__ . "/../app/Views/{$this->viewPath}.phtml")) {
            require_once __DIR__ . "/../app/Views/{$this->viewPath}.phtml";
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

    protected function redirect($redirect, $erro = null) {
        $this->redirect = $redirect;
        $this->erro = $erro;
        $this->getRedirect() === TRUE ?: Container::pageNotFoundLayout();
        $this->setErro();
    }

    protected function getRedirect() {
        header('Location:' . base_url('/') . '' . $this->redirect);
        return TRUE;
    }

    
    protected function setErro() {
        $data = Session::getInstance();
        //fornece qual sera o nome da sessao e sua mensagem
        $data->erro = $this->erro;
        
    }

}
