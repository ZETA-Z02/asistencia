<?php include("header.php") ?>

    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th> USUARIO </th>
                    <th> CARGO </th>
                    <th> ACTUALIZAR </th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                $query = "SELECT * FROM ";  
                $result = mysqli_query($conn,$query);
                
                while(mysqli_fetch_array($result)) {?>
                    <tr>
                        <td><?php echo $row['USUARIO']?> </td> 
                        <td><?php echo $row['PASSWORD']?> </td> 
                        <td>
                            <a href="">
                                Edit
                            </a>
                        </td>
                    </tr>                       
                
                <?php }?>                  
            </tbody>           
        </table>
            </div>
        
    
<?php include("footer.php") ?>







