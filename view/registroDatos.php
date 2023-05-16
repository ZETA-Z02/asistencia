<?php require "header.php";?>
<!--header -->

    <h1>asistencia</h1>

    <form action = "../controller/registroDatos.php" id = "my-form" method = "post">
        <div>
            <span>nombre<input type="text" name="nombre"></span>
        </div>
        <div>
            <span>apellidos<input type="text"  name="apellido"></span>
        </div>
        <div>
            <span>sexo<input type="text"  name="sexo"></span>
        </div>
        <div>
            <span>dni<input type="text"  name="dni"></span>
        </div>
        <div>
            <span>telefono<input type="text"  name="telefono"></span>
        </div>
        <div>
            <span>direccion<input type="text"  name="direccion"></span>
        </div>
        <div>
            <span>ciudad<input type="text"  name="ciudad"></span>
        </div>
        <div>
        <span>cargo</span>
        <input type = "text" name="cargo" list="browsers" >
            <datalist id="browsers">
                <option value="director">
                <option value="personal">
            </datalist>
        </div>

        <button type="submit">loguearse</button>
    </form>




<!--footer-->
<?php require "footer.php";?>