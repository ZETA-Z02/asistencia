<?php

require ("conexion.php");

class Validar{

    private $conn;

    function __construct(){

        $this->conn = new Conexion();
    }


    public function Validar($usuario){
        $sql = "SELECT id_personal, id_cargo, usuario, contraseña FROM login WHERE usuario = '$usuario';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;

    }
    public function RegistrarUsuario($idpersonal,$idcargo,$usuario,$contrasena){
        $sql = "INSERT INTO login VALUES(null,$idpersonal,$idcargo,'$usuario','$contrasena');";
        $this->conn->ConsultaSin($sql);
    }

    public function idPersonal($idpersonal){
        $sql = "SELECT id_personal,id_cargo FROM personal WHERE id_personal ='$idpersonal';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }

    



}

?>