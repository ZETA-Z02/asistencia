<?php

include "../model/consultas.model.php";
session_start();
//loguin funcionando falta a donde redireccionar, redirreccionar a ver tareas para alumnos y rellenar tareas para profesores(admin)

$consultas = new Consultas();
//strpos($variable,'busqueda de ciertos caracteres'); == devuelve la posicion de la busquedao o false si no encuentnra nada


if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    //$password =  $_POST['password'];
    $validar = $consultas->validar($email);   
    //echo $validar['contrasena'];
    //echo $validar['email'];
    if($validar && password_verify($_POST['password'], $validar['contrasena'])){
        //echo 'ingresaste';
        $_SESSION['id'] = $validar['id_u'];
        $_SESSION['privilegio'] = $validar[''];
        header('location: ../view/tareas.php');
    }else{
        $_SESSION['mensaje'] = 'cuenta no encontrada, registrese';
        //$_SESSION['mensaje'] = 'credenciales incorrectas: intenta de nuevo';
        header('location: ../view/loguin.view.php');
    }

}else{
    $_SESSION['mensaje'] = "uno o varios campos esta vacio";
}

?>



