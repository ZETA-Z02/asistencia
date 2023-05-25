<?php

require ("conexion.php");

class Consulta{

    private $conn;

    function __construct(){

        $this->conn = new Conexion();
        return $this->conn;
    }
    //ver el los cargos y sus datos de la fila
    public function verCargos($cargo){
        $sql = "SELECT id_cargo,cargo,nivel_usuario FROM cargo WHERE cargo = '$cargo';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    //para registrar al personal en la tabla personal
    public function RegistrarPersonal($nombre,$apellido,$sexo,$dni,$telefono,$direccion,$ciudad,$idcargo){
        $sql = "INSERT INTO personal VALUES(null,'$nombre','$apellido','$sexo','$dni','$telefono','$direccion','$ciudad','$idcargo');";
        $this->conn->ConsultaSin($sql);
    }
    //para ver el id del personal y el id cargo que posee
    public function veridPersonal($nombre,$apellido,$dni){
        $sql = "SELECT id_personal,id_cargo FROM personal WHERE nombre = '$nombre' AND apellido = '$apellido' AND dni = '$dni';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    //todos los datos del personal mas la columna cargo de la tabla cargo
    public function verPersonal(){
        $sql = "SELECT p.*,c.cargo  FROM personal p  JOIN cargo c on p.id_cargo = c.id_cargo;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    //todos los cargos de login 
    public function todosCargos(){
        $sql = "SELECT * FROM cargo;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    //todos los datos de login 
    public function todosLogin(){
        $sql = "SELECT * FROM login;";
        $data = $this->conn->ConsultaCon($sql);
        return $data;
    }
    //borrar personal
    public function borrarPersonal($idpersonal){
        $sql = "DELETE FROM personal WHERE id_personal  = '$idpersonal';";
        $this->conn->ConsultaSin($sql);
    }
    //borrar login junto a personal, por que si borra personal por ende deberia borrar su login
    public function borrarLoginconPersonal($idpersonal){
        $sql = "DELETE FROM login WHERE id_personal  = '$idpersonal';";
        $this->conn->ConsultaSin($sql);
    }
    //borrar cargo
    public function borrarCargo($idcargo){
        $sql = "DELETE FROM cargo WHERE id_cargo  = '$idcargo';";
        $this->conn->ConsultaSin($sql);
    }
    //borrar login
    public function borrarLogin($idLogin){
        $sql = "DELETE FROM login WHERE id_login  = '$idLogin';";
        $this->conn->ConsultaSin($sql);
    }

    //para ver un cargo en particular para editar
    public function cargoParticular($idcargo){
        $sql = "SELECT * FROM cargo WHERE id_cargo = '$idcargo';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    //para ver un login en particular para editar
    public function loginParticular($idlogin){
        $sql = "SELECT * FROM login WHERE id_login = '$idlogin';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
    //para ver un personal en particular para editar
    public function personalParticular($idpersonal){
        $sql = "SELECT * FROM personal WHERE id_personal = '$idpersonal';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }

    //
    public function consultaHora($id_login){
        $sql = "SELECT COUNT(*) as 'total' from asistencia WHERE id_login='$id_login' ";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }

    //update personal individual
    public function updatePersonal($idpersonal,$nombre,$apellido,$sexo,$telefono,$direccion,$ciudad,$id_cargo){
        $sql = "UPDATE personal SET nombre = '$nombre', apellido = '$apellido', sexo = '$sexo', telefono = $telefono,direccion = '$direccion', ciudad = '$ciudad', id_cargo = $id_cargo WHERE id_personal = $idpersonal;";
        $this->conn->ConsultaSin($sql);
    }
    //update cargos individual
    public function updateCargo($idcargo,$newCargo,$newPago,$newPlanilla,$newNivel,$newTurno,$newHoras){
        $sql = "UPDATE cargo SET cargo = '$newCargo', pago_hora = '$newPago', planilla = '$newPlanilla', nivel_usuario = $newNivel,turno = '$newTurno', horas_trabajo = '$newHoras' WHERE id_cargo = $idcargo;";
        $this->conn->ConsultaSin($sql);
    }
    //ver la contrasena para verificar en la db
    public function verificarPassword($id_login){
        $sql = "SELECT contraseña FROM login WHERE id_login = $id_login;";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }

    //update login
    public function updateLogin($id_login,$usuario,$newPassword){
        $sql = "UPDATE login SET usuario = '$usuario', contraseña = '$newPassword' WHERE id_login = $id_login;";
        $this->conn->ConsultaSin($sql);
    }
    //update login si es que actualiza el personal
    public function updateLoginCargosPersonal($id_personal,$id_cargo){
        $sql = "UPDATE login SET id_cargo = $id_cargo WHERE id_personal= $id_personal;";
        $this->conn->ConsultaSin($sql);
    }




}











?>