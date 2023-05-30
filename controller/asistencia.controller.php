<?php
require ("../model/consultas.model.php");
//marca automaticamente falta a todos, con-> crontab 1 8,14 * * /var/www/html/asistencia/controller/asistencia.controller.php
$consulta = new Consulta();

$fecha = Date("Y-m-d");
echo $fecha.'<br>';
$tipo = 'FALTA';
//id login de los que ingresaron hoy
$asistencia = $consulta->verAsistenciaDia($fecha);
//todos los usuarios
$todosLogin = $consulta->todosLogin();

//ver todos los login y luego comparar si tiene asistencia
foreach ($todosLogin as $loginRegistrado){
    echo 'login se usuarios '.$loginRegistrado['id_login'].'<br>';
    $marcadoFalta = false;
    foreach ($asistencia as $loginAsistencia){
        echo 'login de asistencia '.$loginAsistencia['id_login'].'<br>';
        if($loginRegistrado['id_login']==$loginAsistencia['id_login']){
            //echo 'no pasa nada'.'<br>';
            $marcadoFalta = true;
            break;
        }
    }
    if(!$marcadoFalta){
        echo 'al usuario se le marcara falta '.$loginRegistrado['id_login'].'<br>';
        $consulta->faltaGlobal($loginRegistrado['id_login'],$tipo,$fecha);
    }
}
?>