<?php

    class Conectar {
        protected $dbh;
        
            protected function conexion(){
                
            try{

                $conectar = $this->dbh = new PDO('mysql:host=localhost;dbname=php_soap', 'root', 'sistemas');
                    return $conectar; //TODO! Retornar el PDO para concretar la conexion
            }catch(Exception $e){

                print "Error en la BD" . $e->getMessage() . "<br/>";
                die();
            }
            print "<h1>!Conexion exitosa</h1>";
            }
        
        function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }

?>