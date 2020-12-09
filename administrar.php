<?php
    session_start();
    //include('conexionBDD.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrar Página</title>
        <link rel="stylesheet" href="estilo.css">
        <script>
            document.addEventListener("DOMContentLoaded",() => {
                
            });
        </script>
    </head>
    <body>
        <h1>Usuarios</h1>
        <h2>Borrar</h2>
        <form method="post" action="adminusr.php"><br>
            Nombre: <input type="text" name="nombre"><br>
            <input type="submit" name="borrar" value="Eliminar Usuario"> 
        </form>
        
        <h2>Agregar o Actualizar</h2>
        <form method="post" action="adminusr.php"><br>
            Nombre actual (Solo en caso de actualizar): <input type="text" name="nombre"><br>
            Nuevo nombre: <input type="text" name="nuevo"><br>
            E-Mail: <input type="text" name="email"><br>
            Teléfono: <input type="text" name="telefono"><br>
            Gustos: <br><textarea cols='80' rows='8' name='gustos'></textarea><br>
            <h3>Dirección</h3>
            Calle: <input type="text" name="calle"><br>
            Colonia: <input type="text" name="colonia"><br>
            Ciudad: <input type="text" name="ciudad"><br>
            Estado: <input type="text" name="estado"><br><br>   
            <input type="submit" name="actualizar" value="Actualizar Usuario">
            <input type="submit" name="agregar" value="Agregar Usuario">
        </form>
        <h1>Productos</h1>
            <h2>Borrar</h2>
        <form method="post" action="adminprod.php"><br>
            Nombre: <input type="text" name="nombre"><br>
            <input type="submit" name="borrar" value="Eliminar Producto"> 
        </form>
            <h2>Agregar o Actualizar</h2>
            Nombre actual (Solo en caso de actualizar): <input type="text" name="nombre"><br>
            Nuevo nombre: <input type="text" name="nuevo"><br>
            Categoria: <input type="text" name="categoria"><br>
            Precio: <input type="text" name="precio"><br>
            Descripción: <br><textarea cols='80' rows='8' name='descripcion'></textarea><br>
            <!-- Investigar cómo subir archivos <name="imagen"><br>-->
            <input type="submit" name="actualizar" value="Actualizar Producto">
            <input type="submit" name="agregar" value="Agregar Producto">
    </body>
</html>