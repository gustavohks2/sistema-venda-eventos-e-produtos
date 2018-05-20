<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core;

/**
 * Description of BaseController
 *
 * @author Wesllen
 */
class BaseController {
    
    protected $view;
    private $viewPath;
    
    public function __construct() {
        $this->view = new \stdClass();
        
    }
    
    protected function Render($view){
        $this->viewPath = $view;
        $this->content();
    }
    
    protected function content(){
        if(file_exists(__DIR__."/../app/Views/{$this->viewPath}.phtml")){
            require_once __DIR__."/../app/Views/{$this->viewPath}.phtml";
        }else{
            echo 'Erro: Pagina não encontrada na View';
        }
    }
}
