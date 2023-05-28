<?php require "vista.php";?>
<!--header -->


<?php 
require("../model/consultas.model.php");

$consulta = new Consulta();


//llega el id cargo 
//echo $_GET['idcargo'];
$id_cargo = $_GET['idcargo'];
//echo $id_cargo;


$cargo = $consulta->cargoParticular($id_cargo);

if($cargo['planilla']==1){
    $conPlanilla = 'si';
}else{
    $conPlanilla = 'no';
}


?>

<h1>EDITAR CARGOS</h1>

<form action = "../controller/editar.php?idcargo=<?=$cargo['id_cargo']?>" id = "my-form" method = "post">
    
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">cargo</label>
            <div class="col-sm-8">
                <input type="text" name="cargo" value = "<?= $cargo['cargo'];?>">
            </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">pago por hora</label>
            <div class="col-sm-8">
                <input type="text" name="pago_hora" value = "<?= $cargo['pago_hora'];?>">
            </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">planilla</label>
            <div class="col-sm-8">
                <input type="text" name="planilla" value = "<?= $conPlanilla;?>">
            </div>
    </div>
    <div  class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">nivel de usuario</label>
            <div class="col-sm-8">
                <input type="text" name="nivel_usuario" value = "<?= $cargo['nivel_usuario'];?>">
            </div>
    </div >
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">turno</label>
            <div class="col-sm-8">
                <input type="text" name="turno" value = "<?= $cargo['turno'];?>">
            </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="">horas de trabajo</label>
            <div class="col-sm-8">
                <input type="text" name="horas_trabajo" value = "<?= $cargo['horas_trabajo'];?>">
            </div>
    </div>

    <button type="submit">guardar cambios</button>

</form>



<!--footer-->
<?php require "footer.php";?>