<?php

require "../model/validar.model.php";

$validar =new Validar();


if(!empty($_POST['cargo']) && !empty($_POST['pago_hora']) && !empty($_POST['planilla']) && !empty($_POST['nivel_usuario']) && !empty($_POST['turno']) && !empty($_POST['horas_trabajo'])){
    echo 'funciona';
    //cambiando caracteres a numeros en planilla para la base de datos
    if($_POST['planilla']=='si'){
        $planilla = 1;
    }else{
        $planilla = 2;
    }

    echo $newCargo = $_POST['cargo'];
    echo $newPago = $_POST['pago_hora'];
    echo $newPlanilla = $planilla;
    echo $newNivel = $_POST['nivel_usuario'];
    echo $newTurno = $_POST['turno'];
    echo $newHoras = $_POST['horas_trabajo'];
    //funciona la consulta
    $validar->newCargo($newCargo,$newPago,$newPlanilla,$newNivel,$newTurno,$newHoras);
    
    header("location: ../view/administracion.php");
}else{
    echo 'error';
}



?>