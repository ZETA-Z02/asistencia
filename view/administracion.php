<?php 
session_start();

if(isset($_SESSION['admin']))
{
    include("header.php") ;
    require "../model/consultas.model.php";

$consulta = new Consulta();

$personal = $consulta->verPersonal();
$cargo = $consulta->todosCargos();
$login = $consulta->todosLogin();


?>

    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th> nombre </th>
                    <th> apellido </th>
                    <th> sexo </th>
                    <th> dni </th>
                    <th> telefono </th>
                    <th> direccion </th>
                    <th> ciudad </th>
                    <th> cargo </th>
                    <th> edit </th>
                    <th> delete </th>
                    <th> crear un usuario login </th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                
                while($row = mysqli_fetch_array($personal)) {?>
                    <tr>
                        <td><?php echo $row['nombre']?> </td>
                        <td><?php echo $row['apellido']?> </td> 
                        <td><?php echo $row['sexo']?> </td>
                        <td><?php echo $row['dni']?> </td>
                        <td><?php echo $row['telefono']?> </td>
                        <td><?php echo $row['direccion']?> </td>
                        <td><?php echo $row['ciudad']?> </td>
                        <td><?php echo $row['cargo']?> </td>
                        <td>
                            <a href="../controller/edit.hubicar.php?id_personal=<?=$row['id_personal'];?>">
                                edit
                            </a>
                        </td>
                        <td>
                            <a href="../controller/delete.controller.php?id_personal=<?=$row['id_personal'];?>">
                                delete
                            </a>
                        </td>
                        <!--se deberia crear un login, verificar si ya tiene un login y si no tiene se deberia poder crear-->
                        <td>
                            <a href="../controller/crearLogin.controller.php?id_personal=<?=$row['id_personal'];?>">
                                crear login
                            </a>
                        </td>
                    </tr>                   
                <?php }?>                  
            </tbody>      
        </table>
    </div>

    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th> id_cargo </th>
                    <th> cargo </th>
                    <th> pago_hora </th>
                    <th> planilla </th>
                    <th> nivel_usuario </th>
                    <th> turno </th>
                    <th> horas_trabajo </th>
                    <th> edit </th>
                    <th> delete </th>
                    <th> añadir cargo </th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                
                while($row = mysqli_fetch_array($cargo)) {?>
                    <tr>
                        <td><?php echo $row['id_cargo']?> </td>
                        <td><?php echo $row['cargo']?> </td> 
                        <td><?php echo $row['pago_hora']?> </td>
                        <td><?php echo $row['planilla']?> </td>
                        <td><?php echo $row['nivel_usuario']?> </td>
                        <td><?php echo $row['turno']?> </td>
                        <td><?php echo $row['horas_trabajo']?> </td>
                        
                        <td>
                            <a href="../controller/edit.hubicar.php?id_cargo=<?=$row['id_cargo'];?>">
                                edit
                            </a>
                        </td>
                        <td>
                            <a href="../controller/delete.controller.php?id_cargo=<?php echo $row['id_cargo'];?>">
                                delete
                            </a>
                        </td>
                        <td>
                            <a href="../controllers/editar.controller.php?id=<?php echo $row['id_cargo'];?>">
                                añadir cargo
                            </a>
                        </td>
                    </tr>                   
                <?php }?>                  
            </tbody>      
        </table>
    </div>

    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th> id_login </th>
                    <th> id_personal </th>
                    <th> usuario </th>
                    <th> contrasena </th>
                    <th> edit </th>
                    <th> delete </th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                
                while($row = mysqli_fetch_array($login)) {?>
                    <tr>
                        <td><?php echo $row['id_login']?> </td>
                        <td><?php echo $row['id_personal']?> </td> 
                        <td><?php echo $row['usuario']?> </td>
                        <td><input type="password" value = '<?php echo $row['contraseña']?>' disabled ></td>
                                                
                        <td>
                            <a href="../controller/edit.hubicar.php?id_login=<?=$row['id_login'];?>">
                                edit
                            </a>
                        </td>
                        <td>
                            <a href="../controller/delete.controller.php?id_login=<?php echo $row['id_login'];?>">
                                delete
                            </a>
                        </td>
                    </tr>                   
                <?php }?>                  
            </tbody>      
        </table>
    </div>


    <div>
        <a href="salida.view.php" type="submit">salir</a>
    </div>
        
    
<?php include("footer.php");
}else{
    echo "No te muestro nada";
    header("Location: login.php");
}

?>







