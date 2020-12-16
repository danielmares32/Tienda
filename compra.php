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
    $usrData=buscarusr($usuario,$conexion);
    $nombre=$usrData['nombre'];
    $apellidos=$usrData['apellidos'];
    $tel=$usrData['telefono'];
    $calle=$usrData['calle'];
    $colonia=$usrData['colonia'];
    $estado=$usrData['estado'];
    $ciudad=$usrData['ciudad'];
    $datos="<h3>Nombre: $nombre </h3> <br> <h3>Apellidos: $apellidos </h3> <br>"
            ."<h3>Telefono: $tel </h3> <br> <h3>Calle: $calle </h3> <br>"
            ."<h3>Colonia: $colonia </h3> <br> <h3>Estado: $estado </h3> <br>"
            ."<h3>Ciudad: $ciudad </h3> <br> ";
    $a=0;
    $txtTabla='';
    for($i=0;$i<sizeof($carrito);$i++){
        $idProd=$ids[$a++];
        $cantidad=$carrito[$i++];
        $pago=$carrito[++$i];
        $sql="INSERT INTO comprar VALUES('".$usuario."','".$idProd."','".date('Y-m-d H:i:s')."','".$cantidad."','".$pago."')";
        $result = $conexion->query($sql);
        $existencia=buscarProd($idProd,$conexion)-$cantidad;
        $sql2="UPDATE productos SET existencia='$existencia' WHERE id='$idProd'";
        $result = $conexion->query($sql2);
        $txtTabla=$txtTabla."<tr> <td>$cantidad</td> <td>$idProd</td> <td>$pago</td> </tr>";
    }
    mandarMail($txtTabla,$datos);
    mysqli_close($conexion);

    function buscarusr($idusuario,$conexion){
        //Buscar el id de usuario con el nombre de usuario
        $sql2="SELECT * FROM usuarios WHERE id='$idusuario'";
        $result = $conexion->query($sql2);
        $row=$result->fetch_assoc(); 
        $usr=$row;
        //fin de busqueda
        return $usr;
    }

    function buscarProd($idProd, $conexion){
        //Buscar la existencia con el id
        $sql2="SELECT * FROM productos WHERE id='$idProd'";
        $result = $conexion->query($sql2);
        $row=$result->fetch_assoc(); 
        $existencia=$row['existencia'];
        //fin de busqueda
        return $existencia;
    }

    function mandarMail($txtTabla,$datos){
        $to = "danielmares32@gmail.com";
        $subject = "Orden de Compra";
        $message = "
            <html>
                <head>
                <title>Orden de Compra</title>
                </head>
                <body>
                    $datos
                    <table style='text-align:center' border=1>
                        <tr>
                            <th>Cantidad</th>
                            <th>Producto</th>
                            <th>Pago</th>
                        </tr>
                        $txtTabla
                    </table>
                </body>
            </html>
            ";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: Your name <danielmares32@gmail.com>' . "\r\n";
        if (mail($to,$subject,$message,$headers)) {
            echo "Email successfully sent to $to...";
        } else {
            echo "Email sending failed...";
        }
        
    }
?>
<script>
    localStorage.clear();
    window.location.href="index.php";
</script>
    
