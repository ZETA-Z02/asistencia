<?php
require("../model/consultas.model.php");

$consulta = new Consulta();

switch(true){
  case (isset($_GET['id_personal'])):
    $id_personal = $_GET['id_personal'];
    $consulta->borrarPersonal($id_personal);
    $consulta->borrarLoginconPersonal($id_personal);
    echo 'se ejecuta borrar personal';
    header("location: ../view/administracion.php");
    break;
  case (isset($_GET['id_cargo'])):
    $id_cargo = $_GET['id_cargo'];
    $consulta->borrarCargo($id_cargo);
    echo 'se ejecuta borrar cargo';
    header("location: ../view/administracion.php");
    break;
  case (isset($_GET['id_login'])):
    $id_login = $_GET['id_login'];
    $consulta->borrarLogin($id_login);
    echo 'se ejecuta borrar login';
    header("location: ../view/administracion.php");
    break;
  default:

  echo 'no hay ni un id';
  header("location: ../view/administracion.php");

} 

?>