<?php include("header.php") ;
session_start();
require "../model/consultas.model.php";

$consulta = new Consulta();

$personal = $consulta->verPersonal();


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
                            <a href="">
                                edit
                            </a>
                        </td> 
                        <td>
                            <a href="../controllers/editar.controller.php?id=<?php echo $row['id_personal'];?>">
                                delete
                            </a>
                        </td> 
                        
                    </tr>                       
                
                <?php }?>                  
            </tbody>           
        </table>
            </div>
        
    
<?php include("footer.php");

?>







