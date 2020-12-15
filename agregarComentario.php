<?php 
    session_start();
    include('conexionBDD.php');

    $conexion=conectar();
    if(!$conexion){
        echo "ERROR en conexion BDD";
    }
    $idProd=$_POST['idProd'];
    $opinion=$_POST['AgregarOpinion'];
    $usuario=@$_SESSION['idUsuario'];
    $sql="INSERT INTO opinion VALUES('default','".$opinion."','".date('Y-m-d H:i:s')."','".$usuario."','".$idProd."')";
    $result = $conexion->query($sql);
    mysqli_close($conexion);
?>
<script>
    alert("Comentario Agregado Exitosamente");
    window.location.href="index.php";
</script>