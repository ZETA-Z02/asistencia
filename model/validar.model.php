<?php

require ("conexion.php");

class Validar{

    private $conn;

    function __construct(){

        $this->conn = new Conexion();
    }
    //para loguearse y verificar el usuario si esta registrado
    public function Validar($usuario){
        $sql = "SELECT id_login,id_personal, id_cargo, usuario, contraseña FROM login WHERE usuario = '$usuario';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    //para registrar un usuario
    public function RegistrarUsuario($idpersonal,$idcargo,$usuario,$contrasena){
        $sql = "INSERT INTO login VALUES(null,$idpersonal,$idcargo,'$usuario','$contrasena');";
        $this->conn->ConsultaSin($sql);
    }
    //para ver el id personal y el id cargo de un personal en particular
    public function idPersonal($idpersonal){
        $sql = "SELECT id_personal,id_cargo FROM personal WHERE id_personal ='$idpersonal';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    //para ver el cargo de un personal en particular y que posee el cargo
    public function cargo($idpersonal){
        $sql = "SELECT c.id_cargo, c.cargo, c.nivel_usuario,c.turno,l.id_login, l.id_personal, l.usuario 
        FROM cargo c JOIN login l ON c.id_cargo = l.id_cargo where l.id_personal = '$idpersonal';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    //marca la asistencia de un empleado
    public function marcarAsistencia($id_login,$tipo,$hora,$fecha){
        $sql = "INSERT INTO asistencia VALUES(null,'$id_login','$tipo','$hora','$fecha',null,null);";
        $this->conn->ConsultaSin($sql);
    }
    //para verificar cuantas veces ingreso en una fecha
    public function verificarEntrada($idlogin,$fecha){
        $sql = "SELECT count(*) as total FROM asistencia WHERE id_login = $idlogin AND fecha = '$fecha';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }

    //insertar nuevo cargo
    public function newCargo($cargo,$pago_hora,$planilla,$nivel_usuario,$turno,$horas_trabajo){
        $sql = "INSERT INTO cargo VALUES(null,'$cargo','$pago_hora','$planilla','$nivel_usuario','$turno','$horas_trabajo');";
        $this->conn->ConsultaSin($sql);
    }

    //actualizar falta para los de turno tarde en vez de consultar quien es de que turno a cada rato
    public function updateFaltaVespertino($id_login,$tipo,$hora,$fecha){
        $sql = "UPDATE asistencia SET tipo = '$tipo', hora = '$hora' WHERE id_login = '$id_login' AND fecha = '$fecha' AND tipo = 'FALTA';";
        $this->conn->ConsultaSin($sql);
    }

}

?>