<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;
use Core\BaseController;
/**
 * Description of AdminController
 *
 * @author laboratorio
 */
class AdminController extends BaseController{
    
    public function index(){
        $this->setPageTitle("Admin");
        $this->Render('admin/index', 'layoutAdmin');
    }
}
