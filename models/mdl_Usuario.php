<?php
    class Usuario extends Conectar{
        public function insert_usuario($usr_nom,$usr_ape,$usr_correo)
        {
            $conectar = parent::conexion();
            parent::set_names();
            //TODO* Consulta SQL
            $sql = "INSERT INTO tm_usuario (usr_id,usr_nom,usr_ape,usr_correo,est) VALUES (NULL,?,?,?,'1');";
            $stmt = $conectar -> prepare($sql);
            $stmt->bindValue(1,$usr_nom);
            $stmt->bindValue(2,$usr_ape);
            $stmt->bindValue(3,$usr_correo);
            $stmt->execute();
        }
    }
?>