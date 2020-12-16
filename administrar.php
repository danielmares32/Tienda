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
        <h3>Borrar</h3>
        <form method="post" action="adminusr.php"><br>
            Correo Electrónico: <input type="text" name="nombre"><br>
            <input type="submit" name="borrar" value="Eliminar Usuario"> 
        </form>
        
        <h3>Agregar o Actualizar</h3>
        <form method="post" action="adminusr.php"><br>
            Nombre actual: <input type="text" name="nombre">
            Apellidos actuales: <input type="text" name="apellidos_act"><br>
            <label>Obligatorios</label>
            Nuevo nombre: <input type="text" name="nuevo">
            Nuevos apellidos: <input type="text" name="apellidos_new"><br>
            E-Mail: <input type="text" name="email"><br>
            Fecha de Nacimiento: <input type="date" name="fecha_nac"><br>
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
            <h3>Borrar</h3>
        <form method="post" action="adminprod.php"><br>
            Nombre: <input type="text" name="nombre"><br>
            <input type="submit" name="borrar" value="Eliminar Producto"> 
        
            <h3>Agregar o Actualizar</h3>
            Nombre actual: <input type="text" name="nombre">
            Nuevo nombre: <input type="text" name="nuevo">
            Nuevos apellidos: <input type="text" name="apellidos_new"><br>
            Categoria: <input type="text" name="categoria"><br>
            Precio: <input type="text" name="precio"><br>
            Descripción: <br><textarea cols='80' rows='8' name='descripcion'></textarea><br>
            <!-- Investigar cómo subir archivos <name="imagen"><br>-->
            <label>Elegir Imagen:</label>
                <input type="file" name="imagen">
            <input type="submit" name="actualizar" value="Actualizar Producto">
            <input type="submit" name="agregar" value="Agregar Producto">
        </form>
            
            <a href="index.php">Regresar</a>
    </body>
</html>