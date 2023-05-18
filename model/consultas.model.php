<?php

require ("conexion.php");

class Consulta{

    private $conn;

    function __construct(){

        $this->conn = new Conexion();
        return $this->conn;
    }


    public function verCargos($cargo){
        $sql = "SELECT id_cargo,cargo,nivel_usuario FROM cargo WHERE cargo = '$cargo';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;

    }
    public function RegistrarPersonal($nombre,$apellido,$sexo,$dni,$telefono,$direccion,$ciudad,$idcargo){
        $sql = "INSERT INTO personal VALUES(null,'$nombre','$apellido','$sexo','$dni','$telefono','$direccion','$ciudad','$idcargo');";
        $this->conn->ConsultaSin($sql);
    }
    public function veridPersonal($nombre,$apellido,$dni){
        $sql = "SELECT id_personal,id_cargo FROM personal WHERE nombre = '$nombre' AND apellido = '$apellido' AND dni = '$dni';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }

    public function verPersonal(){
        $sql = "SELECT p.*,c.cargo  FROM personal p  JOIN cargo c on p.id_cargo = c.id_cargo;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }

}











?>