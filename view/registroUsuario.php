<?php require "header.php";?>
<!--header -->

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

    <button type="submit">loguearse</button>
</form>




<!--footer-->
<?php require "footer.php";?>