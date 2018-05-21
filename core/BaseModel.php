<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core;

use Core\DataBase;
/**
 * Description of Model
 *
 * @author Wesllen
 */
abstract class BaseModel {
    
    private $con;
    protected $tabela;
    

    public function __construct() {
        $this->con = new DataBase();
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }
    
   
    
    public function readall($campos = "*", $where = null) {
        try {
            $where_sql = empty($where) ? "" : "WHERE " . $where;
            $r = $this->con->conecta()->prepare("SELECT {$campos} FROM $this->tabela {$where_sql};");
            if ($r->execute()) {
                return $r->fetchAll();
            } else {
                print_r($r->errorInfo());
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}
