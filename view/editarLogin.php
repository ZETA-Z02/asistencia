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
        <span>contrasena<input type="password" name="password" placeholder = "ingrese su contrasena"></span>
    </div>
    <div>
        <span>nueva contrasena<input type="password" name="contraseña" id = "password1" placeholder = "nueva contrasena"></span>
    </div>
    <div>
        <span>repita la contrasena<input type="password" name="contraseña1" id = "newpassword1" placeholder = "repita la contrasena"></span>
    </div>

    <button type="submit">registrar</button>
</form>



<!--footer-->
<?php require "footer.php";?>