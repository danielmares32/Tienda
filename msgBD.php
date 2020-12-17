<?php
    session_start();
    include('conexionBDD.php');

    $idUsr=$_SESSION['idUsuario'];
    $conexion=conectar();
    if(!$conexion){
        echo "ERROR en conexion BDD";
    }
    $sql="SELECT * FROM chat WHERE id_usr='$idUsr' ORDER BY fecha_hora ASC";
    $result = $conexion->query($sql);
    if($result->num_rows>0){
        //Recorremos cada registro y obtenemos los valores de las columnas especificada
        while($row=$result->fetch_assoc()){
            $arr[]=$row;
        }
        echo json_encode($arr);
    } else {
        echo "0 results";
    }
?>
