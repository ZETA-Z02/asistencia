<?php

require "../model/validar.model.php";
session_start();
//loguin funcionando falta a donde redireccionar, redirreccionar a ver tareas para alumnos y rellenar tareas para profesores(admin)

$validar = new Validar();
//strpos($variable,'busqueda de ciertos caracteres'); == devuelve la posicion de la busquedao o false si no encuentnra nada
$fecha = date("Y-m-d");  
$hora = date("H:i:s");

switch (true) { 
    case ($hora >= '07:00:00' && $hora < '07:30:00'):
        echo "Es entrada matutina";
        $tipo = 'Entrada matutina';
        break;
    case ($hora >= '07:31:00' && $hora < '08:00:00'):
        echo "Es entrada tarde";
        $tipo = 'Entrada tarde';
        break;
    case ($hora >= '13:00:00' && $hora < '13:30:00'):
        echo "Es entrada vespertina";
        $tipo = 'Entrada vespertina';
        break;
    case ($hora >= '13:31:00' && $hora < '14:00:00'):
        echo "Es tarde";
        $tipo = 'Entrada tarde';
        break;
}   



if(!empty($_POST['usuario']) && !empty($_POST['password'])){
    $usuario = $_POST['usuario'];
    $password =  $_POST['password'];

    //trae id_login,id_personal,id_cargo,usuario,contrasena
    $validarUsuario = $validar->Validar($usuario);   

    //echo $validar['contraseña'];
    //echo $validar['usuario'];
    if($validarUsuario && password_verify($_POST['password'], $validarUsuario['contraseña'])){
        //echo 'ingresaste';
        $idpersonal = $validarUsuario['id_personal'];
        //trae cargo,pago_hora,planilla, nivel_usuario,turno,horas_trabajo
        $cargo = $validar->cargo($idpersonal);
        //verificar cuantas veces entro y como entro antes para ver si debe marcar assitencia o no
        //x$verificar = $validar->verificarEntrada($validarUsuario['id_login'],$fecha);
        if ($cargo == 'completo'){
            echo $tipo;
            echo 'cargo completo';
            $validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha); 
        }else if($cargo == 'medio' and ($hora >= '07:00:00' && $hora < '07:30:00') or ($hora >= '13:00:00' && $hora < '13:30:00')){
            $unicaEntrada = ' unica';
            $tipo = $tipo.$unicaEntrada;
            echo $tipo;
            echo 'cargo medio entrada unica';
            $validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha); 
        }else{
            echo 'cargo medio entrada';
            $validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha);
        }
        
        //switch para ver nivel de usuario y cada uno a donde se ira
        switch($cargo['nivel_usuario'])
        {
            case 1:
                $_SESSION['admin'] = $validarUsuario['id_personal'];
                $_SESSION['inicio'] = time();
                $_SESSION['privilegio'] = $validarUsuario['nivel_usuario'];
                $_SESSION['id_login'] = $validarUsuario['id_login'];

                         
                //echo $_SESSION['id'];
                //echo $_SESSION['privilegio'];
                //echo "ingresaste";

                //enviar a donde pertenece el usuario segun su nivel
                header("location: ../view/administracion.php");
                break;

            case 2:
                $_SESSION['personal'] = $validarUsuario['id_personal'];
                $_SESSION['inicio'] = time();
                $_SESSION['privilegio'] = $validarUsuario['nivel_usuario'];
                $_SESSION['id_login'] = $validarUsuario['id_login'];

                //$validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha);

                //si es turno completo debe verificar cuantas veces ingreso
                                
                //enviar a donde pertenece el usuario segun su nivel
                header("location: ../view/vistaPersonal.php");
                break;

            case 3:
                $_SESSION['personal_comun'] = $validarUsuario['id_personal'];
                $_SESSION['inicio'] = time();
                $_SESSION['privilegio'] = $validarUsuario['nivel_usuario'];
                $_SESSION['id_login'] = $validarUsuario['id_login'];
                
                
                
                //enviar a donde pertenece el usuario segun su nivel
                header("location: ../view/vistaPersonal.php");
                break;

            default:
            echo "Nivel Desconocido";
            //header("Location: ../index.html");    
        }

        //header('location: ../view/tareas.php');
        
    }else{
        $_SESSION['mensaje'] = 'cuenta no encontrada, registrese';
        //echo "error al verificar contrasenas";
        //$_SESSION['mensaje'] = 'credenciales incorrectas: intenta de nuevo';
        header('location: ../view/login.view.php');
    }

}else{
    echo "no entraste";
    $_SESSION['mensaje'] = "uno o varios campos esta vacio";
    header('location: ../view/login.view.php');
}

?>



