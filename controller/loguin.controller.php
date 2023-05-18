<?php

require "../model/validar.model.php";
session_start();
//loguin funcionando falta a donde redireccionar, redirreccionar a ver tareas para alumnos y rellenar tareas para profesores(admin)

$validar = new Validar();
//strpos($variable,'busqueda de ciertos caracteres'); == devuelve la posicion de la busquedao o false si no encuentnra nada
$fecha = date("Y-m-d");
$hora = date("H:i:s");


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

        
        switch($cargo['nivel_usuario'])
        {
            case 1:
                $_SESSION['admin'] = $idpersonal;
                $_SESSION['inicio'] = time();

                //si es turno completo debe verificar cuantas veces ingreso
                if($cargo['turno'] == 'completo')
                {
                    $verificar = $validar->verificarEntrada($validarUsuario['id_login'],$fecha);
                    if($verificar['total']==0){
                        $tipo = 'Entrada matutina';
                        //echo 'debe marcar ENTRADA MATUTINA';
                        $validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha); 
                    }else{
                        $tipo = 'Entrada tarde';
                        //echo 'debe marcar ENTRADA TARDE';
                        $validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha); 
                    }
                    //echo $cargo['turno'];
                    //echo 'debe marcarse entrada matutina';
                    //$validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha); 

                 //si no es turno completo solo marca entrada   
                }else{
                    $tipo = 'Entrada';
                    //echo 'solo marco entrada';
                    $validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha);  
                }

                $_SESSION['id'] = $validarUsuario['id_personal'];
                $_SESSION['privilegio'] = $validarUsuario['id_cargo'];
                //echo $_SESSION['id'];
                //echo $_SESSION['privilegio'];
                //echo "ingresaste";

                //enviar a donde pertenece el usuario segun su nivel
                header("location: ../view/");
                break;

            case 2:
                $_SESSION['personal'] = $idpersonal;
                $_SESSION['inicio'] = time();

                //$validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha);

                //si es turno completo debe verificar cuantas veces ingreso
                if($cargo['turno'] == 'completo')
                {
                    $verificar = $validar->verificarEntrada($validarUsuario['id_login'],$fecha);
                    if($verificar['total']==0){
                        $tipo = 'entrada matutina';
                        //echo 'debe marcar ENTRADA MATUTINA';
                        $validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha); 
                    }else{
                        $tipo = 'entrada tarde';
                        //echo 'debe marcar ENTRADA TARDE';
                        $validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha); 
                    }
                    //echo $cargo['turno'];
                    //echo 'debe marcarse entrada matutina';
                    //$validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha); 

                 //si no es turno completo solo marca entrada   
                }else{
                    $tipo = 'entrada';
                    //  echo 'solo marco entrada';
                    $validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha);  
                }
                
                
                
                //enviar a donde pertenece el usuario segun su nivel
                header("location: ../view/");
                break;

            case 3:
                $_SESSION['personal_comun'] = $idpersonal;
                $_SESSION['inicio'] = time();

                //$validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha);

                //si es turno completo debe verificar cuantas veces ingreso
                if($cargo['turno'] == 'completo')
                {
                    $verificar = $validar->verificarEntrada($validarUsuario['id_login'],$fecha);
                    if($verificar['total']==0){
                        $tipo = 'entrada matutina';
                        //echo 'debe marcar ENTRADA MATUTINA';
                        $validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha); 
                    }else{
                        $tipo = 'entrada tarde';
                        //echo 'debe marcar ENTRADA TARDE';
                        $validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha); 
                    }
                    //echo $cargo['turno'];
                    //echo 'debe marcarse entrada matutina';
                    //$validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha); 

                 //si no es turno completo solo marca entrada   
                }else{
                    $tipo = 'entrada';
                    //echo 'solo marco entrada';
                    $validar->marcarAsistencia($validarUsuario['id_login'],$tipo,$hora,$fecha);  
                }
                
                
                //enviar a donde pertenece el usuario segun su nivel
                header("location: ../view/");
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



