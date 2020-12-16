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
        $existencia=buscarProd($idProd,$conexion)-$cantidad;
        $sql2="UPDATE productos SET existencia='$existencia' WHERE id='$idProd'";
        $result = $conexion->query($sql2);
    }
    mysqli_close($conexion);

    function buscarProd($idProd, $conexion){
        //Buscar la existencia con el id
        $sql2="SELECT * FROM productos WHERE id='$idProd'";
        $result = $conexion->query($sql2);
        $row=$result->fetch_assoc(); 
        $existencia=$row['existencia'];
        //fin de busqueda
        return $existencia;
    }
?>
<script>
    localStorage.clear();
    window.location.href="index.php";
</script>
    
