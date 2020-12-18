<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Producto</title>
        <link rel="stylesheet" href="estilo.css">
        <style>
            .opinion{
                position: absolute; 
                top: 1200px;
                font-family: Arial, Helvetica, sans-serif;
                width: 80%;
                left: 200px;
            }
            .aopinion{
                width: 80%; 
                height:150px; 
                text-align:center; 
                position:absolute; 
                left:200px; 
                top:900px; 
                font-family:Arial, Helvetica, sans-serif; 
                font-size:large;
            }
        </style>
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
                $existencia=$row['existencia'];
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
        <br><br><br>
        <div id="lbOuter">
            <div id="lbInner"></div>
        </div>
        <img class="imagen" src="data:image/jpg;base64,<?php echo base64_encode($imagen); ?>">
        
        <span class="txtTituloProducto"><?php echo $nombre; ?></span>
        <span class="txtDescripcionProducto">Descripción<br><br><?php echo $descrip; ?></span>
        <span class="txtPrecioProducto">Precio:<?php echo "MX$      ",$precio; ?></span>
        <span class="txtCantidadProducto">Cantidad:</span>

        <form action="carrito.php" method="post">
            <input type="hidden" name="producto" value="<?php echo $idProd; ?>">
            <input class="cantidadProducto" type="number" name="cantidad" min="<?php if($existencia=="0"){echo "0";}else{echo "1";} ?>" max="<?php echo $existencia; ?>" value="<?php if($existencia=="0"){echo "0";}else{echo "1";} ?>">
            <input class="btnComprarProducto" type="submit" value="Comprar">
        </form>

        <h2 style="position:absolute;top:1200px;left:250px">Opiniones</h2>
        <?php
            //Se crea una tabla extrayendo los datos de la base de datos
            $sql = "SELECT * FROM opinion WHERE id_prod=".$idProd." ORDER BY fecha DESC";
            $result = $conexion->query($sql);
            $numFilas = $result->num_rows;
            echo "<table class=opinion border=1>";
                    echo "<tr>"
                            . "<th>Comentario</th>"
                            . "<th>Usuario</th>"
                            . "<th>Fecha</th>"
                       . "</tr>";
            if($result->num_rows>0){
                //Recorremos cada registro y obtenemos los valores de las columnas especificada
                while($row=$result->fetch_assoc()){
                    echo "<tr>"
                            . "<td>".$row['comentario']."</td>"
                            . "<td>".buscarusr($row['id_usr'],$conexion)."</td>"
                            . "<td>".$row['fecha']."</td>"
                       . "</tr>";
                    echo "</form>";
                }
            } else {
                echo "0 results";
            }
            echo "</table>";
            
            function buscarusr($idusuario,$conexion){
                //Buscar el id de usuario con el nombre de usuario
                $sql2="SELECT * FROM usuarios WHERE id='$idusuario'";
                $result = $conexion->query($sql2);
                $row=$result->fetch_assoc(); 
                $usr=$row['nombre']." ".$row['apellidos'];
                //fin de busqueda
                return $usr;
            }
        ?>
        <?php
            mysqli_close($conexion);
            $top=1600+$numFilas*55;
            echo "<div class='footer' style='top: ".$top."px'></div>";
        ?>
        <form action="agregarComentario.php" method="post">
            <input name="idProd" type="hidden" value="<?php echo $idProd; ?>">
            <input name="AgregarOpinion" class="aopinion" type="textarea" placeholder="Escribe tu opinion">
            <input style="position:absolute;top: 1100px;left: 775px;font-size:large" type="submit" value="Enviar">
        </form>
    </body>
</html>
