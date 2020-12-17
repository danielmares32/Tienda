<?php
    session_start();
?>
<html>
    <head>
        <style>
           input[type="submit"]{
                position: absolute;
                padding: 10px;
                color: #fff;
                background: #003ce1;
                width: 300px;
                margin: 20px auto;
                margin-top: 0;
                border:0;
                border-radius: 0;
                cursor: pointer;
                top: 650px;
                left: 820px;
            }
            h2{
                text-align: center;
            }
            table{
                position: absolute;
                top: 100px; 
                left: 720px;
                border: 1px solid black;
                font-size: 25;
            }
            td{
                border:1px solid black;
            }
            th{
                text-align: left;
            }
            body{
                text-align: center;
                font-size:20;
            }
            a{
                position: absolute;
                top: 700px;
                left: 950px;
            }
        </style>
        <meta charset="UTF-8">
        <title>Registrar</title>
    </head>
    <body>
        <form action="registro.php" method="post">
            <!--<table border="1" align="center">-->
            <table align="center">
                <th>Datos Generales</th>
                <tr>
                <td>Nombre:</td> <td><input type="text" name="nombre"></td><br>
                </tr>
                <tr>
                    <td>Apellidos:</td> <td><input type="text" name="apellidos"></td><br>
                </tr>
		<tr>
	    	    <td>Contraseña:</td> <td><input type="password" name="pwd"></td><br>
		</tr>
                <tr>
                    <td>Fecha de Nacimiento:</td> <td><input type="date" name="fecha_nac"></td><br>
                </tr>
                <tr>
                    <td>E-Mail:</td> <td><input type="text" name="email"></td><br>
                </tr>
                <tr>
                    <td>Teléfono:</td> <td><input type="text" name="telefono"></td><br>
                </tr>
                <tr>
                    <td>Gustos:</td> <td><textarea cols='30' rows='5' name='gustos'></textarea></td><br>
                </tr>
            
                <th>Dirección</th>
            <tr>
                <td>Calle:</td> <td><input type="text" name="calle"></td><br>
            </tr>
            <tr>
                <td>Colonia:</td> <td><input type="text" name="colonia"></td><br>
            </tr>
            <tr>
            <td>Ciudad:</td> <td><input type="text" name="ciudad"></td><br>
            </tr>
            <tr>
            <td>Estado:</td> <td><input type="text" name="estado"></td><br><br>
            </tr>
            </table><br>
            <input type="submit" name="registro" value="Registrar">
        </form>
        <p><a href="index.php">Inicio</a></p>
    </body>
</html>
