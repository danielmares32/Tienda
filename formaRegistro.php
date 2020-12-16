<?php
    session_start();
?>
<html>
    <head>
        <style>
        </style>
        <meta charset="UTF-8">
        <title>Registrar</title>
    </head>
    <body>
        <form action="registro.php" method="post">
            <h3>Datos Generales</h3>
            Nombre: <input type="text" name="nombre"><br>
            Apellidos: <input type="text" name="apellidos"><br>
            Contraseña: <input type="password" name="pwd"><br>
            Fecha de Nacimiento: <input type="date" name="fecha_nac"><br>
            E-Mail: <input type="text" name="email"><br>
            Teléfono: <input type="text" name="telefono"><br>
            Gustos: <br><textarea cols='80' rows='8' name='gustos'></textarea><br>
            <h3>Dirección</h3>
            Calle: <input type="text" name="calle"><br>
            Colonia: <input type="text" name="colonia"><br>
            Ciudad: <input type="text" name="ciudad"><br>
            Estado: <input type="text" name="estado"><br><br>
            <input type="submit" name="registro" value="Registrar">
        </form>
        <p><a href="index.php">Inicio</a></p>
    </body>
</html>
