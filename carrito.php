<?php
    session_start();
    include('conexionBDD.php');
?>
<html>
<head>
    <style>
    </style>
    <meta charset="UTF-8">
        <title>Carrito</title>
</head>
<body>
    
    <?php
    if(!@$_SESSION['entra']){
    ?>
            <script language="javascript" type="text/javascript">
                window.alert("Debes estar logeado para realizar una compra");
            </script>
            <a href="login.php">Iniciar Sesión</a>
    <?php
    }else{
        $usuario=@$_SESSION['idUsuario'];
        $row=$_POST['producto'];
        $nombre=$row['nombre_prod'];
        $precio=$row['precio_prod'];
        $descrip=$row['descripcion_prod'];
        $imagen=$row['imagen_prod'];
   
    }
    ?>
    
</body>
</html>
    


