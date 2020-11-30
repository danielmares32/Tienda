<?php
    function conectar(){
    //parametros de conexión
        $servername="localhost";
        $database="tienda";
        $username="root";
        $password="";
    //crear la conexion
        $conn= mysqli_connect($servername,$username, $password, $database);
    //checar si se realizo la conexion
        if(!$conn){
            die("Error: la conexion no se realizo correctamente.".mysqli_connect_error());
        }
        //echo "conexion correcta";
        echo "<p>";
        $cbd= mysqli_select_db($conn, $database);
        if(!$cbd){
            die("ERROR CON LA CONEXION CON LA BASE DE DATOS");
        }
        //echo "conexion a ".$database." correcta";
        echo "</p>";
        return($conn);
    }
?>