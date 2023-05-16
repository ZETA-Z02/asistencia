<?php require "header.php";?>
<!--header -->
<?php
require "../model/validar.model.php";
echo $_GET['idpersonal'];
//echo $_GET['cargo'];
$idpersonal = $_GET['idpersonal'];  
$validar = new Validar();   
$idpersonal = $validar->idPersonal($idpersonal);

$idper = $idpersonal['id_personal'];
$idcar = $idpersonal['id_cargo'];

?>

<h1>registor usuario</h1>

<form action = "../controller/registroUsuario.php" id = "my-form" method = "post">
    
    <div>
        <span>usuario<input type="text" name="usuario"></span>
    </div>
    <div>
        <span>contrasena<input type="password" name="contraseña" id="contraseña"></span>
    </div>
    <div>
        <span>repita la contrasena<input type="password" name="contraseña1" id="contraseña1"></span>
    </div>

    <input type="hidden" name= "idcargo" value=<?= $idcar ?>>
    <input type="hidden" name= "idpersonal" value=<?= $idper ?>>

    <button type="submit">registrar</button>
</form>




<!--footer-->
<?php require "footer.php";?>