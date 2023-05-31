<?php
require ("../model/consultas.model.php");
//instancia de consulta
$consulta = new Consulta();

if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['sexo']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['ciudad']) && !empty($_POST['cargo'])){
    //echo 'datos llegando';
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $sexo = $_POST['sexo'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];

    $cargo = $_POST['cargo'];

    $verCargos=$consulta->verCargos($cargo);
    echo $verCargos['id_cargo'];

    if(!empty($verCargos)){
        echo 'se cumple';
        //$registrarCargo = $verCargos['id_cargo'];

        $consulta->RegistrarPersonal($nombre,$apellido,$sexo,$dni,$telefono,$direccion,$ciudad,$verCargos['id_cargo']);

        //Obtener el ID del personal registrado getConnection()->lastInsertId();
        //$id_personal = $consulta->getConnection()->lastInsertId();
        
        $datos = $consulta->veridPersonal($nombre,$apellido,$dni);

        echo $datos['id_personal'];
        echo $datos['id_cargo'];
        
        //echo $datos['id_personal'];
        
        //Redireccionar a la página "registroUsuario.php" con el ID del personal en la URL
        
        //echo 'funciona el envio de datos';
        
        //header("location: ../view/registroUsuario.php?id_personal=".urlencode($datos['id_personal']));
        
        header("location: ../view/registroUsuario.php?idpersonal=".urlencode($datos['id_personal']));
    }else{
        echo 'no se cumple y no se inserta datos';
        header("location: ../view/registroDatos.php");
    }

    

}else{
    echo 'error faltan datos por llenar';
    header("location: ../view/registroDatos.php");
}

?>