<?php
session_start();
include("header.php") ;
//el PERSONAL debe poder ver sus datos con su cargo(consulta doble), y su asistencia con un grafico si se puede
require "../model/consultas.model.php";

$consulta = new Consulta();
$asistenciaPersonal = $consulta->mostrarAsistenciaPersonal($_SESSION['id_login']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Personal</title>
</head>
<body>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>id_asistencia</th>
                <th>tipo</th>
                <th>hora</th>
                <th>fecha</th>
                <th>hora de salia</th>
                <th>tiempo de uso</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($mostrar=mysqli_fetch_array($asistenciaPersonal)){
            ?>
            
                <tr>
                    <td><?php echo $mostrar['id_asistencia']?></td>
                    <td><?php echo $mostrar['tipo']?></td>
                    <td><?php echo $mostrar['hora']?></td>
                    <td><?php echo $mostrar['fecha']?></td>
                    <td><?php echo $mostrar['horasalida']?></td>
                    <td><?php echo $mostrar['tiempo_uso']?></td>
                </tr>
                
            <?php
                }
            ?>
        </tbody>
    </table>


    <div>
        <a href="../controller/salida.controller.php">
            <button>salir</button>
        </a>
    </div>

</body>
</html>

<?php include("footer.php");?>