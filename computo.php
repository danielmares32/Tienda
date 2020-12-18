<?php 
    session_start();
    include("mostrarProductos.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Productos</title>
        <link rel="stylesheet" href="estilo.css">
        <script>
            document.addEventListener("DOMContentLoaded",() => {
                
            });
        </script>
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
            <?php
            if(@$_SESSION['esAdmin']){
            ?>
            <a href="chatAdmin.php">Chat Administrador</a>
            <?php
            }else{
            ?>
            <a href="chat.php">Chat</a>
            <?php
            }
            ?>
            <?php if(!@$_SESSION['entra']){?>
            <a href="login.php">Iniciar Sesión</a>
            <?php }else{ 
            echo "<a>Hola ".@$_SESSION['nombre']."</a>"; //Cambiar <p> por (?)
            ?>
            <a href="logout.php?salir=true">Cerrar Sesión</a>
            <?php
            if(@$_SESSION['esAdmin']){?>                    
                    <a href="administrar.php">Administrar Página</a>
            <?php
                }
            }
            ?>
        </div>
        <h2 style="top: 200px; left: 100px">Productos de Computo</h2>
        <?php
            $cat="Computo";
            $nProd=mostrarProductos($cat);
            if($nProd==0){
                $nProd=3;
            }
        ?>
        <div class="footer" style="top:<?php echo $nProd*300; ?>px">
            
        </div> 
    </body>
</html>
