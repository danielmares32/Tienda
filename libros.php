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
            <a href="usuario.php">Usuario</a>
        </div>
        <h2 style="top: 150px; left: 100px">Libros</h2>
        <?php
            $cat="Libros";
            mostrarProductos($cat); 
        ?>
        <div class="footer" style="top: 1750px">
            
        </div> 
    </body>
</html>
