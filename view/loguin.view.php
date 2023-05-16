<?php require "header.php";?>
<!--header -->

    <h1>asistencia</h1>

    <form action = "../controller/loguin.controller.php" method = "post">
        <div>
           <span>usuario<input type="usuario" name = "usuario"></span>
        </div>
        <div>
            <span>contrasena<input type="password" name = "password"></span>
        </div>
        <button type="submit">loguearse</button>
    </form>




<!--footer-->
<?php require "footer.php";?>