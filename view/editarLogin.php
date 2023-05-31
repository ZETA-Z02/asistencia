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
    
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">usuario</label>
        <div class="col-sm-8">
        <input type="text" name="usuario" value = "<?= $login['usuario'];?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">contrasena</label>
        <div class="col-sm-8">
        <input type="password" name="password" placeholder = "ingrese su contrasena">
        </div>

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">nueva contrasena</label>
        <div class="col-sm-8">
        <input type="password" name="contraseña" id = "password1" placeholder = "nueva contrasena">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">repita la contrasenal</label>
        <div class="col-sm-8">
        <input type="password" name="contraseña1" id = "newpassword1" placeholder = "repita la contrasena">
        </div>
    </div>

    <button type="submit">registrar</button>
    
</form>



<!--footer-->
<?php require "footer.php";?>