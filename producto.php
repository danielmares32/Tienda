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
                var image=document.querySelector(".imagen");
                image.onclick=() => {
                    var duplicar=image.cloneNode(false);
                    duplicar.classList.remove("imagen");
                    var lb=document.getElementById("lbInner");
                    lb.innerHTML="";
                    lb.appendChild(duplicar);
                    lb=document.getElementById("lbOuter");
                    lb.classList.add("show");
                }
                document.getElementById("lbOuter").onclick=() => {
                   document.getElementById("lbOuter").classList.remove("show");
                }
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
            <a href="juguetes.php">Juguetes</a>
            <a href="ropa.php">Ropa</a>
            <a href="libros.php">Libros</a>
            <a href="equipaje.php">Equipaje</a>
            <a href="carrito.php">Carrito</a>
            <a href="usuario.php">Usuario</a>
        </div>
        <br><br><br>
        <div id="lbOuter">
            <div id="lbInner"></div>
        </div>
        <img class="imagen" src="data:image/jpg;base64,<?php echo base64_encode($imagen); ?>">
        <div class="footer" style="top: 1200px">
        </div> 
        <span class="txtTituloProducto"><?php echo $nombre; ?></span>
        <span class="txtDescripcionProducto">Descripción<br><br><?php echo $descrip; ?></span>
        <span class="txtPrecioProducto">Precio:<?php echo "MX$      ",$precio; ?></span>
        <form action="carrito.php" method="post">
            <input type="hidden" name="producto" value="<?php $row ?>">
            <input class="btnComprarProducto" type="submit" value="Comprar">
        </form>
        <?php
            mysqli_close($conexion);
        ?>
    </body>
</html>
