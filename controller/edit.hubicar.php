<?php
//agarra y redirecciona a la hubicacion en view para editar datos o cargos

//echo $_GET['id_personal'];
//echo $_GET['id_cargo'];
//echo $_GET['id_login'];

switch (true){
    case (isset($_GET['id_personal'])):
    $idpersonal = $_GET['id_personal'];
    header("location: ../view/editarPersonal.php?idpersonal=".urlencode($idpersonal));
    break;
    
    case (isset($_GET['id_cargo'])):
    $idcargo = $_GET['id_cargo'];
    header("location: ../view/editarCargo.php?idcargo=".urlencode($idcargo));
    break;

    case (isset($_GET['id_login'])):
    $idlogin = $_GET['id_login'];
    header("location: ../view/editarLogin.php?idlogin=".urlencode($idlogin));
    break;
}



?>