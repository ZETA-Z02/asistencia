<?php

require("../model/consultas.model.php");

$consulta = new Consulta();
//que llegue los datos y se actualice con las funciones
switch(true){

    case (isset($_GET['idpersonal'])):
        $id_personal = $_GET['idpersonal'];
        //echo $id_personal;
        






        break;

    case (isset($_GET['idcargo'])):
        $id_cargo = $_GET['idcargo'];
        //echo $id_cargo;

        break;

    case (isset($_GET['idlogin']));
        $id_login = $_GET['idlogin'];
        //echo $id_login;

        break;

    default:

        echo 'no hay ni un id';
        header("location: ../view/");

}

?>