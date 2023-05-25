<?php require "header.php";?>
<!--header -->
<?php 
require ("../model/consultas.model.php");
$consulta = new Consulta();
$cargos = $consulta->todosCargos();
?>

<h1>REGISTRO DE PERSONAL</h1>

<form action="../controller/registroDatos.controller.php" method="post" id = "my-form">

    <input type="hidden" name="idpersonal">

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">Nombre</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">Apellidos:</label>
        <div class="col-sm-8">
            <input type="text" required class="form-control" id="apellido" name="apellido">
        </div>
    </div>
    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Sexo:</legend>
        <input type="text" name = "sexo">
        </div>
    </fieldset>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">DNI:</label>
        <div class="col-sm-2">
            <input type="text" required class="form-control" id="dni" name="dni">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">Telefono:</label>
        <div class="col-sm-3">
            <input type="text" required class="form-control" id="telefono" name="telefono">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Dirección:</label>
        <div class="col-sm-2">
            <input type="text" required class="form-control" id="direccion" name="direccion" >
        </div>
    </div>
    <div class="row mb-3">
        <label for="fecha_nacimiento" class="col-sm-2 col-form-label">Fecha de nacimiento:</label>
        <div class="col-sm-2">
            <input type="date" required class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Ciudad:</label>
        <div class="col-sm-2">
            <input type="text" required class="form-control" id="direccion" name="ciudad" >
        </div>
    </div>
    
    <div>
        <span>cargo</span>
        <input type = "text" name="cargo" list="browsers" >
            <datalist id="browsers">
            <?php while($row = mysqli_fetch_array($cargos)) {?>
                <option value="<?= $row['cargo']?>">
            <?php }?>
            </datalist>
        </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary" name="btn-agregar" id="btn-agregar">Guardar cambios</button>
    </div>
</form><!-- Finalizar formulario de edición de perfil -->




<!--footer-->
<?php require "footer.php";?>