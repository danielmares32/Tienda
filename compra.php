<?php
    session_start();
    include('conexionBDD.php');

    $conexion=conectar();
    if(!$conexion){
        echo "ERROR en conexion BDD";
    }
    $usuario=@$_SESSION['idUsuario'];
    $carrito=$_GET['prodAcompra'];
    $ids=$_GET['ids'];
    $a=0;
    for($i=0;$i<sizeof($carrito);$i++){
        $idProd=$ids[$a++];
        $cantidad=$carrito[$i++];
        $pago=$carrito[++$i];
        $sql="INSERT INTO comprar VALUES('".$usuario."','".$idProd."','".date('Y-m-d H:i:s')."','".$cantidad."','".$pago."')";
        $result = $conexion->query($sql);
    }
    mysqli_close($conexion);
    header('Location:index.php');
?>
