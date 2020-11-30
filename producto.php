<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Producto</title>
        <link rel="stylesheet" href="estilo.css">
        <script>
            document.addEventListener("DOMContentLoaded",() => {
                
            });
        </script>
    </head>
    <body>
        <?php
            include("ConexionBDD.php");
            $conexion=conectar();
            if(!$conexion){
                echo "ERROR en conexion BDD";
            }
            $idProd=$_POST['id_prod'];
            //Buscar el nombre,imagen,precio,descripcion de producto con el id de producto
                $sql="SELECT * FROM productos WHERE id='".$idProd."'";
                $result = $conexion->query($sql);
                $row=$result->fetch_assoc(); 
                $nombre=$row['nombre_prod'];
                $precio=$row['precio_prod'];
                $descrip=$row['descripcion_prod'];
                $imagen=$row['imagen_prod'];
            //fin de busqueda
            
        ?>
        <h1 class="titulos"><a href="index.php">MiTienda.com</a></h1>
        <div class="navbar">
            <a href="computo.php">Computo</a>
            <a href="muebles.php">Muebles</a>
            <a href="#cat">Categoria 3</a>
            <a href="#cat">Categoria 4</a>
            <a href="#cat">Categoria 5</a>
            <a href="#cat">Categoria 6</a>
            <a href="#cat">Carrito</a>
            <a href="#cat">Usuario</a>
        </div>
        <br><br><br>
        <img class="imagen" src="data:image/jpg;base64,<?php echo base64_encode($imagen); ?>">
        <div class="footer" style="top: 1200px">
        </div> 
        <span class="txtTituloProducto"><?php echo $nombre; ?></span>
        <span class="txtDescripcionProducto">Descripción<br><br><?php echo $descrip; ?></span>
        <span class="txtPrecioProducto">Precio:<?php echo "MX$      ",$precio; ?></span>
        <form>
            <input class="btnComprarProducto" type="submit" value="Comprar">
        </form>
        <?php
            mysqli_close($conexion);
        ?>
    </body>
</html>
