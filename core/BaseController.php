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
    private $layoutPath;
    private $pageTitle;
    
    public function __construct() {
        $this->view = new \stdClass();
        
    }
    
    protected function Render($view, $layoutPath = null){
        $this->viewPath = $view;
        $this->layoutPath = $layoutPath;
        
        //Se existir layout passa o caminho dele caso contrario passa so o caminho do arquivo da view
        if($layoutPath){
            $this->layout();
        }else{
           $this->content(); 
        }
    }
    
    protected function content(){
        if(file_exists(__DIR__."/../app/Views/{$this->viewPath}.phtml")){
            require_once __DIR__."/../app/Views/{$this->viewPath}.phtml";
        }else{
            Container::pageNotFoundView();
        }
    }
    
    protected function layout(){
        if(file_exists(__DIR__."/../app/Views/tamplate/{$this->layoutPath}.phtml")){
            require_once __DIR__."/../app/Views/tamplate/{$this->layoutPath}.phtml";
        }else{
            Container::pageNotFoundLayout();
        }
    }
    
    protected function setPageTitle($pageTitle){
        $this->pageTitle = $pageTitle;
    }
    
    protected function getPageTitle($separator = null){
        if($separator){
            echo $this->pageTitle . " " . $separator ." " ;
        }else{
            echo $this->pageTitle;
        }
    }
}
