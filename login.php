<?php
    session_start();
?>
<html>
    <head>
        <style>

        </style>
        <meta charset="UTF-8">
        <title>Iniciar Sesión</title>
    </head>
    <body>
    <form action="acceso.php" method="post">
        <p style="position: absolute; top: 100px; left: 400px">
        <h1>Iniciar Sesión</h1>
        Correo electrónico: <br><input type="text" name="nombre"><br><br>
        Contraseña: <br><input type="password" name="pwd"><br><br>
        <input type="submit" name="acceso" value="Iniciar Sesión">
        </p>
    </form>
        <p>¿No estás registrado?<br>Haz click <a href="formaRegistro.php">aquí</a>!</p><br>
        <p><a href="index.php">Inicio</a></p>
    </body>
</html>



