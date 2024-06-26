<?php
date_default_timezone_set('America/Lima');

class Conexion{

    private $conn;

    public function __construct(){
        
        $host = "localhost"; 
        $user = "jersson";
        $password = "jersson"; 
        $db = "transportes";

        $this->conn=new mysqli($host, $user,$password ,$db);

        if($this->conn->connect_error) {
            echo "error al conectar a Mysql: (" . $this->conn->connect_error. ")" . $this->conn->connect_error;
            exit();
        }

        //echo "ver la conexion";
        return $this->conn;
        //echo "conexion exitosa";


    }

    public function ConsultaSin($sql){
        #INSERT, DELETE, UPDATE
        #echo $sql;
        if(!$this->conn->query($sql)){
            echo "Error. ".mysqli_error($this->conn);
            exit();
        }
        return true;
    }

    
    public function ConsultaCon($sql)
    {
        # Sirve para: SELECT

        if(!$result = $this->conn->query($sql)){
            echo "Error: ".mysqli_error($this->conn);
            return false;
            exit();
        }

        return $result;
    }

    public function ConsultaArray($sql)
    {
        # Sirve para: SELECT convertido en array
        #echo $sql;

        if(!$result = $this->conn->query($sql)){
            echo "Error. ".mysqli_error($this->conn);
            return false;
        }

        $data = $result->fetch_array(MYSQLI_ASSOC);
        return $data;
    }
    


}

?>