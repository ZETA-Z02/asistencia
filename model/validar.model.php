<?php

require ("conxion.php");

class Validar{

    private $conn;

    function __construct(){

        $this->conn = new Conexion();
        return $this->conn;
    }


    public function Validar($usuario){
        $sql = "SELECT usuario, contraseña FROM login WHERE usuario = $usuario";
        $data = $this->conn->ConsultaArray($sql);
        return $data;

    }



}

?>