<?php require "header.php";?>
<!--header -->

<?php 

require("../model/consultas.model.php");

$consulta = new Consulta();

//llega el id login 
//echo $_GET['idlogin'];
$id_login = $_GET['idlogin'];
//echo $id_login;

$login = $consulta->loginParticular($id_login);

?>

<h1>EDITAR AL USUARIO Y CONTRASEÑA</h1>

<form action = "../controller/editar.php?idlogin=<?= $login['id_login']?>" id = "my-form" method = "post">
    
    <div>
        <span>usuario<input type="text" name="usuario" value = "<?= $login['usuario'];?>"></span>
    </div>
    <div>
        <span>contrasena<input type="password" name="contraseña" id="contraseña" placeholder = "ingrese su contrasena"></span>
    </div>
    <div>
        <span>nueva contrasena<input type="password" name="contraseña" id="contraseña" placeholder = "nueva contrasena"></span>
    </div>
    <div>
        <span>repita la contrasena<input type="password" name="contraseña1" id="contraseña1" placeholder = "repita la contrasena"></span>
    </div>
    <input type="hidden" name= "idcargo" value=<?= $idcar ?>>
    <input type="hidden" name= "idpersonal" value=<?= $idper ?>>

    <button type="submit">registrar</button>
</form>



<!--footer-->
<?php require "footer.php";?>