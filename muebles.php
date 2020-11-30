<?php 
    session_start();
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
            <a href="#cat">Categoria 3</a>
            <a href="#cat">Categoria 4</a>
            <a href="#cat">Categoria 5</a>
            <a href="#cat">Categoria 6</a>
            <a href="#cat">Carrito</a>
            <a href="#cat">Usuario</a>
        </div>
        <h2 style="top: 150px; left: 100px">Productos de Hogar</h2>
        
        <?php
        
        mostrarProductos();
        
        function mostrarProductos(){
            include("ConexionBDD.php");
            $conexion=conectar();
            $numProd=0;
            $td=false;
            if(!$conexion){
                echo "ERROR en conexion BDD";
            }
            //Poner todas las imagenes de los productos en la tabla
            $sql="SELECT * FROM productos WHERE categoria_prod='Hogar'";
            $result = $conexion->query($sql);
            echo "<table>";
            if($result->num_rows>0){
                //Recorremos cada registro y obtenemos los valores de las columnas especificada
                while($row=$result->fetch_assoc()){
                    if($numProd%3==0){
                        if($td){
                            echo "</tr>";
                        } 
                        echo "<tr>";
                        $td=true;
                    }
                    echo "<td>";
                    echo "<form action='producto.php' method='post'>";
                        echo "<input name='id_prod' type='hidden' value='".$row['id']."'>"
                        ."<input style='height: 400px;width: 400px' type='image' src='data:image/jpg;base64,".base64_encode($row['imagen_prod'])."'><br>"
                        ."<input style='font-size:x-large;background-color: transparent; border: 0px solid' type='submit' value='".$row['nombre_prod']."'><br>"
                        ."Precio: MX$   ".$row['precio_prod']."<br>";
                    echo "</form>";
                    echo "</td>";
                    $numProd++;
                }
            } else {
                echo "0 results";
            }
            echo "</table>";
        }
        //mysqli_close($conexion);
        ?>
        <div class="footer" style="top: 1750px">
            
        </div> 
    </body>
</html>
