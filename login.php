<?php
    session_start();
?>
<html>
    <head>
        <style>
            body{
                margin: 0;
                padding: 0;
                font-family: 'Times New Roman', Times, serif;
                font-size: 25;
                text-align: center;
            }
            input[type="text"], input[type="password"]{
                outline: none;
                padding: 20px;
                display: block;
                width: 300px;
                border-radius: 2px;
                border: 1px solid #eee;
                margin: 20px auto;
            }
            
            input[type="submit"]{
                padding: 10px;
                color: #fff;
                background: #003ce1;
                width: 300px;
                margin: 20px auto;
                margin-top: 0;
                border:0;
                border-radius: 0;
                cursor: pointer;
            }
        </style>
        <meta charset="UTF-8">
        <title>Iniciar Sesión</title>
    </head>
    <body>       
    <form action="acceso.php" method="post" align="center">
        <p style="position: absolute; top: 100px; left: 400px">
        <h1 align="center">Iniciar Sesión</h1>
        <input type="text" name="nombre" placeholder="Correo Electrónico">
        <input type="password" name="pwd" placeholder="Contraseña">
        <input type="submit" name="acceso" value="Iniciar Sesión">
        </p>
    </form>
        <p>¿No estás registrado?<br>¡Haz click <a href="formaRegistro.php">aquí</a>!</p><br>
	<p><a href="index.php">Inicio</a></p>
    </body>
</html>



