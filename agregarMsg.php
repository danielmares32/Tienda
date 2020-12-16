<?php
    session_start();
    include('conexionBDD.php');

    $conexion=conectar();
    if(!$conexion){
        echo "ERROR en conexion BDD";
    }
    $pregunta=$_POST['pregunta'];
    $idusr=$_SESSION['idUsuario'];
    $sql="INSERT INTO chat VALUES('default','$pregunta','$idusr','".date("Y-m-d H:i:s")."','0')";
    $result = $conexion->query($sql);
    //echo "<h1>$result</h1>";

    mysqli_close($conexion);
    header('Location: chat.php');
?>