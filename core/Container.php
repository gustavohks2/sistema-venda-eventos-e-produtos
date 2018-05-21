<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core;

/**
 * Description of container
 *
 * @author Wesllen
 */
class Container {
   
    public static function newController($controller){
        $Objcontroller =  "App\\Controllers\\" . $controller;
        return new $Objcontroller;
    }
    
    public static function pageNotFoundRota(){
        if(file_exists(__DIR__.'/../app/Views/404/rota-404.phtml')){
            return require __DIR__.'/../app/Views/404/rota-404.phtml';
        }else{
            echo 'Erro404: page not found';
        }
    }
    
    public static function pageNotFoundLayout(){
        if(file_exists(__DIR__.'/../app/Views/404/layout-404.phtml')){
            return require __DIR__.'/../app/Views/404/layout-404.phtml';
        }else{
            echo 'Erro404: page not found';
        }
    }
    public static function pageNotFoundView(){
        if(file_exists(__DIR__.'/../app/Views/404/view-404.phtml')){
            return require __DIR__.'/../app/Views/404/view-404.phtml';
        }else{
            echo 'Erro404: page not found';
        }
    }
}
