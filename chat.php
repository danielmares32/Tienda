<?php
    session_start();
    include('conexionBDD.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chat</title>
        <link rel="stylesheet" href="estilo.css">
        <style>
            .pregunta{
                width: 500px; 
                height:500px; 
                text-align:center; 
                position:absolute; 
                left:500px; 
                top:300px; 
                font-family:Arial, Helvetica, sans-serif; 
                font-size:large;
            }
        </style>
    </head>
    <body>
    <h1 class="titulos"><a href="index.php">MiTienda.com</a></h1>
        <div class="navbar">
            <a href="computo.php">Computo</a>
            <a href="muebles.php">Muebles</a>
            <a href="juguetes.php">Juguetes</a>
            <a href="ropa.php">Ropa</a>
            <a href="libros.php">Libros</a>
            <a href="equipaje.php">Equipaje</a>
            <a href="carrito.php">Carrito</a>
            <a href="chat.php">Chat</a>
            <?php if(!@$_SESSION['entra']){?>
            <a href="login.php">Iniciar Sesión</a>
            <?php }else{ 
            echo "<a>Hola ".@$_SESSION['nombre']."</a>"; //Cambiar <p> por (?)
                if(@$_SESSION['esAdmin']){?>                    
                    <a href="administrar.php">Administrar Página</a>
            <?php
                }
            }
            ?>
        </div>
        <h2 style="top: 200px; left: 100px">Contacto</h2>
        <form action="" method="post">
            <input name="pregunta" class="pregunta" type="textarea" placeholder="Escribe tu pregunta">
            <input style="position:absolute;top: 850px;left: 725px;" type="submit" value="Enviar">
        </form>
        <?php
            $conexion=conectar();
            if(!$conexion){
                echo "ERROR en conexion BDD";
            }
            $pregunta=$_POST['pregunta'];
            $idusr=@$_SESSION['idUsuario'];
            $sql="INSERT INTO chat VALUES('default','".$pregunta."','".$idusr."','')";
            $result = $conexion->query($sql);
        ?>

        <div class="footer" style="top:900px">
    </body>
</html>
