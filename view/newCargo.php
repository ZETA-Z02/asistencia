<?php require "header.php";?>
<!--header -->
<h1>EDITAR CARGOS</h1>

<form action = "../controller/newCargo.controller.php" id = "my-form" method = "post">
    
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">cargo</label>
            <div class="col-sm-8">
                <input type="text" name = "cargo">
            </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">pago por hora</label>
            <div class="col-sm-8">
                <input type="text" name="pago_hora" value = "">
            </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">planilla</label>
            <div class="col-sm-8">
                <input type="text" name="planilla" value = "">
            </div>
    </div>
    <div  class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">nivel de usuario</label>
            <div class="col-sm-8">
                <input type="text" name="nivel_usuario" value = "">
            </div>
    </div >
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">turno</label>
            <div class="col-sm-8">
                <input type="text" name="turno" value = "">
            </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">horas de trabajo</label>
            <div class="col-sm-8">
                <input type="text" name="horas_trabajo" value = "">
            </div>
    </div>

    <button type="submit">nuevo cargo</button>

</form>



<!--footer-->
<?php require "footer.php";?>