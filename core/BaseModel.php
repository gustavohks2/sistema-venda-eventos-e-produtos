<?php

namespace Core;

use Core\DataBase;

abstract class BaseModel {

    private $con;
    protected $tabela;
    protected $tabela2;
    protected $tabela3;
    protected $tabelaUse;
    protected $chaveEstrangeira;
    protected $chaveEstrangeira1;
    protected $chaveEstrangeira2;

    public function __construct() {
        $this->con = new DataBase();
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function read($campos = "*", $where = null) {
        try {           

            $where_sql = empty($where) ? "" : "WHERE " . $where;
            $tabelaPrincipal = "";

            switch($this->tabelaUse) {
                case 1: 
                    $tabelaPrincipal = $this->tabela;
                    break;
                case 2:
                    $tabelaPrincipal = $this->tabela2;
                    break;
                case 3:
                    $tabelaPrincipal = $this->tabela3;
                    break;
                case 4:
                    $tabelaPrincipal = $this->tabela4;
                    break;
                default:
                    $tabelaPrincipal = $this->tabela;
                    break;
            }

            $r = $this->con->conecta()->prepare("SELECT {$campos} FROM {$tabelaPrincipal} {$where_sql};");
            if ($r->execute()) {
                return $r->fetchAll();
            } else {
                print_r($r->errorInfo());
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function readKey($campos = "*",$campos_values, $where = null) {
        try {
            $where_sql = empty($where) ? "" : "WHERE " . $where;
            $r = $this->con->conecta()->prepare("SELECT {$campos} FROM $this->tabela  {$campos_values} {$where_sql};");
            
            if ($r->execute()) return $r->fetchAll();
            else print_r($r->errorInfo());
            
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function insert(array $campos_values) {
        //atribui a uma variavel a quantidade de tabelas a serem usadas
        $total = $this->tabelaUse;
        switch ($total) {
            Case 1:
                try {
                    $campos_array_0 = array_keys($campos_values[0]);
                    $values_array_0 = array_values($campos_values[0]);

                    $insert_campos_0 = implode(",", $campos_array_0);
                    $insert_values_0 = implode("','", $values_array_0);

                    $query1 = $this->con->conecta()->prepare("INSERT INTO $this->tabela ({$insert_campos_0}) VALUES('{$insert_values_0}');");

                    if ($query1->execute()) {
                        return TRUE;
                    } else {
                        print_r($query1->errorInfo());
                        return FALSE;
                    }
                } catch (PDOException $ex) {
                    echo $ex->getMessage();
                }

                break;
            Case 2:
                try {
                    $campos_array_0 = array_keys($campos_values[0]);
                    $values_array_0 = array_values($campos_values[0]);

                    $insert_campos_0 = implode(",", $campos_array_0);
                    $insert_values_0 = implode("','", $values_array_0);

                    $query1 = $this->con->conecta()->prepare("INSERT INTO $this->tabela ({$insert_campos_0}) VALUES('{$insert_values_0}');");

                    if ($query1->execute()) {
                        $id = $this->con->conecta()->lastInsertId();

                        $campos_array_1 = array_keys($campos_values[1]);
                        $values_array_1 = array_values($campos_values[1]);

                        $insert_campos_1 = implode(",", $campos_array_1);
                        $insert_values_1 = implode("','", $values_array_1);
                        $query2 = $this->con->conecta()->prepare("INSERT INTO $this->tabela2 ({$insert_campos_1}, $this->chaveEstrangeira) VALUES('{$insert_values_1}','{$id}');");

                        if ($query2->execute()) {

                            return TRUE;
                        } else {
                            print_r($query2->errorInfo());
                            return FALSE;
                        }
                    } else {
                        print_r($query->errorInfo());
                        return FALSE;
                    }
                } catch (PDOException $ex) {
                    echo $ex->getMessage();
                }
                break;
            Case 3:
                try {
                    $campos_array_0 = array_keys($campos_values[0]);
                    $values_array_0 = array_values($campos_values[0]);

                    $insert_campos_0 = implode(",", $campos_array_0);
                    $insert_values_0 = implode("','", $values_array_0);
                    
                    $query1 = $this->con->conecta()->prepare("INSERT INTO $this->tabela ({$insert_campos_0}) VALUES('{$insert_values_0}');");
                    if ($query1->execute()) {
                        $id = $this->con->conecta()->lastInsertId();

                        $campos_array_1 = array_keys($campos_values[1]);
                        $values_array_1 = array_values($campos_values[1]);

                        $insert_campos_1 = implode(",", $campos_array_1);
                        $insert_values_1 = implode("','", $values_array_1);
                        
                        $query2 = $this->con->conecta()->prepare("INSERT INTO $this->tabela2 ({$insert_campos_1}, $this->chaveEstrangeira) VALUES('{$insert_values_1}','{$id}');");

                        if ($query2->execute()) {

                            $id = $this->con->conecta()->lastInsertId();

                            $campos_array_2 = array_keys($campos_values[2]);
                            $values_array_2 = array_values($campos_values[2]);

                            $insert_campos_2 = implode(",", $campos_array_2);
                            $insert_values_2 = implode("','", $values_array_2);
                            
                            $query3 = $this->con->conecta()->prepare("INSERT INTO $this->tabela3 ({$insert_campos_2}, $this->chaveEstrangeira1) VALUES('{$insert_values_2}','{$id}');");

                            if ($query3->execute()) {
                                return TRUE;
                            } else {
                                print_r($query3->errorInfo());
                                return FALSE;
                            }
                        } else {
                            print_r($query2->errorInfo());
                            return FALSE;
                        }
                    } else {
                        print_r($query1->errorInfo());
                        return FALSE;
                    }
                } catch (PDOException $ex) {
                    echo $ex->getMessage();
                }
                break;
            Case 4:
                try {
                    $campos_array_0 = array_keys($campos_values[0]);
                    $values_array_0 = array_values($campos_values[0]);

                    $insert_campos_0 = implode(",", $campos_array_0);
                    $insert_values_0 = implode("','", $values_array_0);

                    $query1 = $this->con->conecta()->prepare("INSERT INTO $this->tabela ({$insert_campos_0}) VALUES('{$insert_values_0}');");

                    if ($query1->execute()) {
                        $id = $this->con->conecta()->lastInsertId();

                        $campos_array_1 = array_keys($campos_values[1]);
                        $values_array_1 = array_values($campos_values[1]);

                        $insert_campos_1 = implode(",", $campos_array_1);
                        $insert_values_1 = implode("','", $values_array_1);

                        $query2 = $this->con->conecta()->prepare("INSERT INTO $this->tabela2 ({$insert_campos_1}, $this->chaveEstrangeira) VALUES('{$insert_values_1}','{$id}');");

                        if ($query2->execute()) {

                            $id = $this->con->conecta()->lastInsertId();

                            $campos_array_2 = array_keys($campos_values[2]);
                            $values_array_2 = array_values($campos_values[2]);

                            $insert_campos_2 = implode(",", $campos_array_2);
                            $insert_values_2 = implode("','", $values_array_2);

                            $query3 = $this->con->conecta()->prepare("INSERT INTO $this->tabela3 ({$insert_campos_2}, $this->chaveEstrangeira1) VALUES('{$insert_values_2}','{$id}');");

                            if ($query3->execute()) {

                                $id = $this->con->conecta()->lastInsertId();

                                $campos_array_3 = array_keys($campos_values[3]);
                                $values_array_3 = array_values($campos_values[3]);

                                $insert_campos_3 = implode(",", $campos_array_3);
                                $insert_values_3 = implode("','", $values_array_3);

                                $query4 = $this->con->conecta()->prepare("INSERT INTO $this->tabela3 ({$insert_campos_3}, $this->chaveEstrangeira1) VALUES('{$insert_values_3}','{$id}');");

                                if ($query4->execute()) {
                                    return TRUE;
                                } else {
                                    print_r($query4->errorInfo());
                                    return FALSE;
                                }
                            } else {
                                print_r($query3->errorInfo());
                                return FALSE;
                            }
                        } else {
                            print_r($query2->errorInfo());
                            return FALSE;
                        }
                        return TRUE;
                    } else {
                        print_r($query1->errorInfo());
                        return FALSE;
                    }
                } catch (PDOException $ex) {
                    echo $ex->getMessage();
                }
                break;
        }
    }
    
    public function update(array $campos_values, $where = null, $tabela = "") {
        $this->tabela = empty($tabela) ? $this->tabela : $tabela;
        try {
            $where_sql = empty($where) ? "" : "WHERE " . $where;

            $sql_text_array = array();
            foreach ($campos_values as $campo => $valor) {
                array_push($sql_text_array, "{$campo}='{$valor}'");
            }
            $sql_text = implode(",", $sql_text_array);
            $r = $this->con->conecta()->prepare("UPDATE {$this->tabela} SET {$sql_text} {$where_sql}");
            $r->execute();
            if ($r->rowCount() >= 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function updateWithChildRows(array $campos_values, $foreign_keys) {
        try {

            $sql_text_array = array();
            $sql_texts = array();

            foreach($campos_values as $campo_values) {
                foreach ($campo_values as $campo => $valor) {
                    array_push($sql_text_array, "{$campo}='{$valor}'");
                }
                $sql_texts[] = implode(", ", $sql_text_array);
                $sql_text_array = array();
            }

            $tables = [];

            for ($i = 1; $i <= count($foreign_keys); $i++) {
                if($i > 1) $tables[] = "tabela$i";
                else $tables[] = "tabela";
            }
            $foreign_keys_names = array_keys($foreign_keys);
            $foreign_keys_values = array_values($foreign_keys);

            for ($i = 0; $i < count($foreign_keys); $i++) {
                $r = $this->con->conecta()->prepare("UPDATE {$this->{$tables[$i]}} SET {$sql_texts[$i]} WHERE {$foreign_keys_names[$i]} = {$foreign_keys_values[$i]}");
                $r->execute();
                if (!($r->rowCount() >= 0)) return FALSE;
            }
            return TRUE;
            
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
            echo 'teste'; exit;
        }
    }
    
    public function delete($where_sql) {
        try {
            $r = $this->con->conecta()->prepare("DELETE FROM $this->tabela WHERE {$where_sql}");
            

            $r->execute();
            if($r->rowCount()) {
              return TRUE;  
            } else {
                return FALSE; 
            }
        } catch (\PDOException $ex) {
             echo $ex->getMessage();
        }
    }

    public function uploadImage($file) {
        $allowed_extensions = ["png", "jpg", "jpeg"];
        if ($file["error"] === 0) {
            $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
            if (in_array($ext, $allowed_extensions)) {

                $fileName = uniqid("", true) . "." . $ext;
                $filePath = __DIR__ . DIRECTORY_SEPARATOR . "../core/imagens" . DIRECTORY_SEPARATOR . $fileName;

                if (move_uploaded_file($file["tmp_name"], $filePath)) return $fileName;
                else return FALSE;

            } else { return FALSE; }

            return TRUE;
        }
        return FALSE;
    }

}
