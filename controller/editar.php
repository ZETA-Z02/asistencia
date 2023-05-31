<?php

require("../model/consultas.model.php");

$consulta = new Consulta();
//que llegue los datos y se actualice con las funciones
switch(true){

    case (isset($_GET['idpersonal'])):
        $id_personal = $_GET['idpersonal']; 

        //echo $id_personal;
        
        if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['sexo']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['ciudad']) && !empty($_POST['cargo'])){
            //echo 'datos llegando';
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $sexo = $_POST['sexo'];
            //dni no debe actualizar
            //$dni = $_POST['dni'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $ciudad = $_POST['ciudad'];
        
            $cargo = $_POST['cargo'];
        
            $verCargos = $consulta->verCargos($cargo);
            //echo $verCargos['id_cargo'];
            //tengo el id del cargo que fue seleccionado
            if(!empty($verCargos)){
                //echo 'se cumple';
                $verCargos['id_cargo'];
                //se edbe actualizar los datos, consulta para actualizar
                $consulta->updatePersonal($id_personal,$nombre,$apellido,$sexo,$telefono,$direccion,$ciudad,$verCargos['id_cargo']);
                $consulta->updateLoginCargosPersonal($id_personal,$verCargos['id_cargo']);
                header("location: ");

            }else{
                echo 'no se cumple y no se actualiza datos';
                header("location: ../view/administracion.php");
            }
        
            
        
        }else{
            echo 'error faltan datos por llenar';
            header("location: ../view/administracion.php");
        }

        break;
//update cargos
    case (isset($_GET['idcargo'])):
        $id_cargo = $_GET['idcargo'];
        //echo $id_cargo;

       
        //llegan todos los datos
     
        if(!empty($_POST['cargo']) && !empty($_POST['pago_hora']) && !empty($_POST['planilla']) && !empty($_POST['nivel_usuario'])&& !empty($_POST['turno'])&& !empty($_POST['horas_trabajo'])){
            echo 'funciona';
            //cambiando caracteres a numeros en planilla para la base de datos
            if($_POST['planilla']=='si'){
                $planilla = 1;
            }else{
                $planilla = 2;
            }

            $newCargo = $_POST['cargo'];
            $newPago = $_POST['pago_hora'];
            $newPlanilla = $planilla;
            $newNivel = $_POST['nivel_usuario'];
            $newTurno = $_POST['turno'];
            $newHoras = $_POST['horas_trabajo'];
            //funciona la consulta
            $consulta->updateCargo($id_cargo,$newCargo,$newPago,$newPlanilla,$newNivel,$newTurno,$newHoras);
            header("location: ");
            
        }else{
            echo 'error faltan datos por llenar';
            header("location: ../view/administracion.php");
        }


        break;



//update login, se debe poder cambiar la contrase;a
    case (isset($_GET['idlogin']));
        $id_login = $_GET['idlogin'];
        //echo $id_login;

        $password = $consulta->verificarPassword($id_login);
        

        if(!empty($_POST['usuario']) && !empty($_POST['contraseña1']) && password_verify($_POST['password'], $password['contraseña'])){
            $newUser = $_POST['usuario'];
            $newPassword = $_POST['contraseña1'];

            $newContrasena = password_hash($_POST['contraseña1'], PASSWORD_BCRYPT);

            $consulta->updateLogin($id_login,$newUser,$newContrasena);

            header("location: ../view/administracion.php");
        }else{
            echo 'error faltan datos por llenar';
            header("location: ../view/administracion.php");
        }

        break;

    default:

        echo 'no hay ni un id';
        header("location: ../view/administracion.php");

}

?>