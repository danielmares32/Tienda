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
            <a href="#cat">Categoria 4</a>
            <a href="#cat">Categoria 5</a>
            <a href="#cat">Categoria 6</a>
            <a href="#cat">Carrito</a>
            <a href="#cat">Usuario</a>
        </div>
        <h2 style="top: 150px; left: 100px">Productos de Computo</h2>
        <?php
            $cat="Computo";
            mostrarProductos($cat);
        ?>
        <div class="footer" style="top: 1750px">
            
        </div> 
    </body>
</html>
