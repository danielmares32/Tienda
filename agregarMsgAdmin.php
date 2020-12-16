<?php
    session_start();
    include('conexionBDD.php');

    $conexion=conectar();
    if(!$conexion){
        echo "ERROR en conexion BDD";
    }
    $pregunta="(admin)".$_POST['pregunta'];
    $idusr=$_POST['idUsuario'];
    $sql="INSERT INTO chat VALUES('default','$pregunta','$idusr','".date("Y-m-d H:i:s")."','1')";
    $result = $conexion->query($sql);
    $sql="UPDATE chat SET respondida='1' WHERE id_usr='$idusr'";
    $result = $conexion->query($sql);

    mysqli_close($conexion);
    header('Location: chatAdmin.php');
?>