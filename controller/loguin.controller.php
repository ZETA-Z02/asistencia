<?php

require "../model/validar.model.php";
session_start();
//loguin funcionando falta a donde redireccionar, redirreccionar a ver tareas para alumnos y rellenar tareas para profesores(admin)

$validar = new Validar();
//strpos($variable,'busqueda de ciertos caracteres'); == devuelve la posicion de la busquedao o false si no encuentnra nada
$fecha = date("Y-m-d");
$hora = date("H:i:s");
$tipo = "Entrada";

if(!empty($_POST['usuario']) && !empty($_POST['password'])){
    $usuario = $_POST['usuario'];
    $password =  $_POST['password'];
    $validar = $validar->Validar($usuario);   

    //echo $validar['contraseña'];
    //echo $validar['usuario'];
    if($validar && password_verify($_POST['password'], $validar['contraseña'])){
        //echo 'ingresaste';

        $cargo = $validar->cargo($validar['id_personal']);
        $idpersonal = $Validar['id_personal'];
        switch($cargo['nivel_usuario'])
        {
            case 1:
                $_SESSION['admin'] = $idpersonal;
                $_SESSION['inicio'] = time();
                
                


                break;

            case 2:



                break;

            case 3:


                break;





            default:
            echo "Nivel Desconocido";
            //header("Location: ../index.html");    
        }






        $_SESSION['id'] = $validar['id_personal'];
        $_SESSION['privilegio'] = $validar['id_cargo'];
        echo "ingresaste";
        //header('location: ../view/tareas.php');
        
    }else{
        $_SESSION['mensaje'] = 'cuenta no encontrada, registrese';
        //echo "error al verificar contrasenas";
        //$_SESSION['mensaje'] = 'credenciales incorrectas: intenta de nuevo';
        header('location: ../view/loguin.view.php');
    }

}else{
    echo "no entraste";
    $_SESSION['mensaje'] = "uno o varios campos esta vacio";
}

?>



