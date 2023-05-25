<?php require "header.php";?>
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
    
    <div>
        <span>cargo<input type="text" name="cargo" value = "<?= $cargo['cargo'];?>"></span>
    </div>
    <div>
        <span>pago por hora<input type="text" name="pago_hora" value = "<?= $cargo['pago_hora'];?>"></span>
    </div>
    <div>
        <span>planilla<input type="text" name="planilla" value = "<?= $conPlanilla;?>"></span>
    </div>
    <div>
        <span>nivel de usuario<input type="text" name="nivel_usuario" value = "<?= $cargo['nivel_usuario'];?>"></span>
    </div>
    <div>
        <span>turno<input type="text" name="turno" value = "<?= $cargo['turno'];?>"></span>
    </div>
    <div>
        <span>horas de trabajo<input type="text" name="horas_trabajo" value = "<?= $cargo['horas_trabajo'];?>"></span>
    </div>

    <button type="submit">guardar cambios</button>

</form>



<!--footer-->
<?php require "footer.php";?>