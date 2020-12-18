<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrar Usuarios</title>
        <!--<link rel="stylesheet" href="estilo.css">-->
        <script>
            document.addEventListener("DOMContentLoaded",() => {
                
            });
        </script>
    </head>
    <style>
        body{
                text-align: center;
                font-size:20;
                font-family: Arial;
            }
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
        table{
                border: 1px solid black;
                font-size: 25;
            }
        td{
                border:1px solid black;
            }
        th{
                text-align: left;
            }
        a{
                position: absolute;
                top: 750px;
                left: 740px;
            }
    </style>
    <body>
        <h1>Usuarios</h1>
        <h3>Borrar</h3>
        <form method="post" action="adminusr.php"><br>
            <table style="position: absolute; top:110px; left:610px">
                <tr>
                    <td>Correo Electrónico:</td> <td><input type="text" name="nombre"></td><br>
                </tr>
                
            </table>
                <input type="submit" name="borrar" value="Eliminar Usuario">
        </form>
        
        <h3>Agregar o Actualizar</h3>
        <form method="post" action="adminusr.php"><br>
            <table style="position: absolute; top:260px; left:472px">
            <tr>
                <td>Nombre actual: </td><td><input type="text" name="nombre"></td><br>
            </tr>
            <tr>
                <td>Apellidos actuales: </td><td><input type="text" name="apellidos_act"></td><br>
            </tr>
            
            <tr>
                <td>Nuevo nombre:</td><td> <input type="text" name="nuevo" required></td><br>
            </tr>
            <tr>
                <td>Nuevos apellidos:</td><td> <input type="text" name="apellidos_new" required></td><br>
            </tr>
            <tr>
                <td>E-Mail:</td><td> <input type="text" name="email"></td><br>
            </tr>
            <tr>
                <td>Fecha de Nacimiento: </td><td><input type="date" name="fecha_nac"></td><br>
            </tr>
            <tr>
                <td>Teléfono:</td><td> <input type="text" name="telefono"></td><br>
            </tr>
            <tr>
                <td>Gustos:</td><td><textarea cols='30' rows='8' name='gustos'></textarea></td><br>
            </tr>
            <th>Dirección</th>
            <tr>
                <td>Calle:</td><td> <input type="text" name="calle"></td><br>
            </tr>
            <tr>
                <td>Colonia:</td><td> <input type="text" name="colonia"></td><br>
            </tr>
            <tr>
                <td>Ciudad:</td><td> <input type="text" name="ciudad"></td><br>
            </tr>
            <tr>
                <td>Estado:</td><td> <input type="text" name="estado"></td><br> 
            </tr>
            <tr>
                <td style="align-self: center"><input type="submit" name="actualizar" value="Actualizar Usuario"></td>
                <td style="align-self: center"><input type="submit" name="agregar" value="Agregar Usuario"></td>
            </tr>
            </table>
        </form>
            <a href="administrar.php">Regresar</a>
    </body>
</html>