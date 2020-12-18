<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrar Página</title>
        <!--<link rel="stylesheet" href="estilo.css">-->
        <script>
            document.addEventListener("DOMContentLoaded",() => {
                
            });
        </script>
    </head>
    <style>
        input[type="submit"]{
                padding: 10px;
                color: #fff;
                background: #003ce1;
                width: 290px;
                margin: 20px auto;
                margin-top: 0;
                border:0;
                border-radius: 0;
                cursor: pointer;
            }
            body{
                text-align: center;
                font-family: Arial;
            }
    </style>
    <body>
        <h1>Administrar Página</h1>
        <form action="administrar_usr.php">
            <input type="submit" value="Administrar Usuarios">
        </form>
        <form action="administrar_prod.php">
            <input type="submit" value="Administrar Productos">
        </form>
        <a href="index.php">Regresar</a>
    </body>
</html>
