<?php
    require "header.php";
?>


<div class="fondo-login">
    <div class="inicio">
        <a href="../index.html">
            <img src="../img/inicio.png" alt="">VUELVA AL INICIO
        </a>  
    </div>
    <div class="titulo">
        Iniciar Session en Transpotes Puno
    </div>
    <form action=" " method="POST" class="col-3 login" autocomplete="off">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email </label>
            <input type="email" name="correo" class="form-control" id="exampleInputEmail1" placeholder="user@senati.pe" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <div class="box-eye">
                <button type="button" onclick="mostrarContraseña('password','eyepassword')">
                </button>
            </div>
            <input type="password" name="contraseña" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Repeat the Password</label>
            <div class="box-eye">
                <button type="button" onclick="mostrarContraseña('password2','eyepassword2')">
                </button>
            </div>
            <input type="password" name="confirmarContraseña" class="form-control" id="password2">
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
    <div class="login col-3 mt-3">
        Si no tiene cuenta registrese por este medio <a href="signup.php" style="text-decoration: none;">Nueva cuenta</a>
    </div>
</div>


<?php
    require "footer.php";
?>