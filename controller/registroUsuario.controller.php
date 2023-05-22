<?php

require "../model/validar.model.php";

$validar =new Validar();


if(!empty($_POST['usuario']) && !empty($_POST['contraseña']) && ($_POST['contraseña']== $_POST['contraseña1'])){
    //datos a variables 
    $usuario = $_POST['usuario'];
    //$contrasena = $_POST['contraseña'];
    //$contrasena1 = $_POST['contraseña1'];

    //echo $usuario;
    //echo $contrasena;
    //echo $contrasena1;
    //contrasena encriptada
    $idpersonal = $_POST['idpersonal'];
    $idcargo = $_POST['idcargo'];

    $contrasena = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
    
    $validar->registrarUsuario($idpersonal,$idcargo,$usuario, $contrasena);
    
    header("location: ../");
}else{
    echo 'error';
}



?>