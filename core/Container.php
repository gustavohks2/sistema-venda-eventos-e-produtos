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
}
