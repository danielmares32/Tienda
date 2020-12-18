<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrar Productos</title>
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
                top: 650px;
                left: 740px;
            }

    </style>
    <body>
        <h1>Productos</h1>
        <h3>Borrar</h3>
        <form method="post" action="adminprod.php"><br>
            <table style="position: absolute; top:110px; left:670px">
                <tr>
                    <td>Nombre</td> <td><input type="text" name="nombre"></td><br>
                </tr> 
            </table>
            
            <input type="submit" name="borrar" value="Eliminar Producto">
            
        </form>
        
        <h3>Agregar o Actualizar</h3>
        <form method="post" action="adminprod.php"><br>
            <table style="position: absolute; top:260px; left:472px">
            <tr>
                <td>Nombre actual: </td><td><input type="text" name="nombre"></td><br>
            </tr>          
            <tr>
                <td>Nuevo nombre:</td><td> <input type="text" name="nuevo" required></td><br>
            </tr>
            <tr>
                <td>Categoría:</td><td> <input type="text" name="categoria"></td><br>
            </tr>
            <tr>
                <td>Precio:</td><td> <input type="text" name="precio"></td><br>
            </tr>            
            <tr>
                <td>Descripción:</td><td><textarea cols='30' rows='8' name='descripcion'></textarea></td><br>
            </tr>
            <tr>
                <td>Existencias:</td><td><input type="text" name="existencias"></td>
            </tr>
                <td style="align-self: center"><input type="submit" name="actualizar" value="Actualizar Producto"></td>
                <td style="align-self: center"><input type="submit" name="agregar" value="Agregar Producto"></td>
            </tr>
            </table>
        </form>
            <a href="administrar.php">Regresar</a>
    </body>
</html>
