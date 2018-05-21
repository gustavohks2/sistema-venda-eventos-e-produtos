<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core;
use PDO;
use PDOException;
/**
 * Description of DataBase
 *
 * @author Wesllen
 */
class DataBase {
    private $usuario;
    private $senha;
    private $servidor;
    private $dbName;
    private static $pdo;
    
//    public function __construct() {

//        
//        $this->usuario = $username;
//        $this->servidor = $host;
//        $this->dbName = $dbname;
//        $this->senha = $password;
//        $this->charset = $charset;
//    }
    
    
    
    public function __construct() {
        $conf = require_once __DIR__.'/../app/Config/config.php';
        
        $dbname = $conf['database']['dbname'];
        $host = $conf['database']['host'];
        $username = $conf['database']['username'];
        $password = $conf['database']['password'];
        $charset = $conf['database']['charset'];
        $collation = $conf['database']['collation'];
        
        $this->usuario = $username;
        $this->servidor = $host;
        $this->dbName = $dbname;
        $this->senha = $password;
        $this->charset = $charset;
    }
    
     public function conecta() {
        try {
            if (is_null(self::$pdo)) {
                self::$pdo = new PDO("mysql:host=".$this->servidor."; dbname=$this->dbName;, charset=".$this->charset, $this->usuario, $this->senha);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);               
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            }
            return self::$pdo;
        } catch (PDOException $ex) {
            die("Erro: <code>" . $ex->getMessage() . "</code>");
        }
    }
}
