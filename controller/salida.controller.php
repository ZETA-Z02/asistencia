<?php 
session_start();
if(isset($_SESSION['admin']))
{
    require ("../model/conexion.php");

    $conexion = new Conexion();

    $tiempoEntrada = $_SESSION['inicio'];
    $tiempoSalida = time(); 
    $tiempoUso = ($tiempoSalida - $tiempoEntrada)/60;

    //$horas = floor($tiempoUso / 3600);
    //$minutos = floor(($tiempoUso % 3600) / 60);
    //$segundos = $tiempoUso % 60;
    //echo $horas;
    //echo "Tiempo de uso: " . $horas . " horas, " . $minutos . " minutos, " . $segundos . " segundos.";

    # arreglar

    $fecha    = date("Y-m-d");  
    $hora     = date("H:i:s");

    $id_login=$_SESSION['id_login'];

    $sql_last = "SELECT id_asistencia FROM asistencia WHERE fecha = '$fecha' and id_login = $id_login ORDER BY id_asistencia DESC LIMIT 1;";
    $ultimo_codigo = $conexion->ConsultaArray($sql_last);
    
    $ultimo = $ultimo_codigo['id_asistencia'];

    $sql="UPDATE asistencia SET horasalida = '$hora', tiempo_uso = '$tiempoUso' WHERE id_asistencia = $ultimo;"; 
    $response = $conexion->ConsultaSin($sql);

    session_destroy();
    
    if($response)
    {
        #echo "Termino la session";
        header("Location: ../view/login.php");
        exit();
    }else{
        echo "Sigues activo";
    }
}else if(isset($_SESSION['personal']))
{
    require ("../model/conexion.php");

    $conexion = new Conexion();

    $tiempo = $_SESSION['inicio']; # arreglar

    $fecha    = date("Y-m-d");  
    $hora     = date("H:i:s");

    $id_login=$_SESSION['id_login'];

    $sql_last = "SELECT id_asistencia FROM asistencia WHERE fecha = '$fecha' and id_login = $id_login ORDER BY id_asistencia DESC LIMIT 1;";
    $ultimo_codigo = $conexion->ConsultaArray($sql_last);
    
    $ultimo = $ultimo_codigo['id_asistencia'];

    $sql="UPDATE asistencia SET horasalida = '$hora', tiempo_uso = '$tiempo' WHERE id_asistencia = $ultimo;"; 
    $response = $conexion->ConsultaSin($sql);

    session_destroy();
    
    if($response)
    {
        #echo "Termino la session";
        session_destroy();
        header("Location: ../view/login.php");
    }else{
        echo "Sigues activo";
    }
}else if(isset($_SESSION['personal_comun']))
{
    require ("../model/conexion.php");

    $conexion = new Conexion();

    $tiempo = $_SESSION['inicio']; # arreglar

    $fecha    = date("Y-m-d");  
    $hora     = date("H:i:s");

    $id_login=$_SESSION['id_login'];

    $sql_last = "SELECT id_asistencia FROM asistencia WHERE fecha = '$fecha' and id_login = $id_login ORDER BY id_asistencia DESC LIMIT 1;";
    $ultimo_codigo = $conexion->ConsultaArray($sql_last);
    
    $ultimo = $ultimo_codigo['id_asistencia'];

    $sql="UPDATE asistencia SET horasalida = '$hora', tiempo_uso = '$tiempo' WHERE id_asistencia = $ultimo;"; 
    $response = $conexion->ConsultaSin($sql);

    session_destroy();
    
    if($response)
    {
        #echo "Termino la session";
        session_destroy();
        header("Location: ../view/login.php");
    }else{
        echo "Sigues activo";
    }
}































