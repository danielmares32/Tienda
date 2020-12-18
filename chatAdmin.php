<?php
    session_start();
    include('conexionBDD.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chat</title>
        <link rel="stylesheet" href="estilo.css">
        <style>
            table {
                color:black; 
                background: white;
                position:absolute;
                top: 350px;
                left: 10%;
                border-spacing: 10px;
                text-align: center;
                width: 80%;
            }
            th{
                font-family: Arial, Helvetica, sans-serif;
                background-color: white;
                padding:10px;
            }
            td{
                padding:10px;
                background-color: white;
            }

        </style>
    </head>
    <body>
    <h1 class="titulos"><a href="index.php">MiTienda.com</a></h1>
        <div class="navbar">
            <a href="computo.php">Computo</a>
            <a href="muebles.php">Muebles</a>
            <a href="juguetes.php">Juguetes</a>
            <a href="ropa.php">Ropa</a>
            <a href="libros.php">Libros</a>
            <a href="equipaje.php">Equipaje</a>
            <a href="carrito.php">Carrito</a>
            <?php
            if(@$_SESSION['esAdmin']){
            ?>
            <a href="chatAdmin.php">Chat Administrador</a>
            <?php
            }else{
            ?>
            <a href="chat.php">Chat</a>
            <?php
            }
            ?>
            <?php if(!@$_SESSION['entra']){?>
            <a href="login.php">Iniciar Sesión</a>
            <?php }else{ 
            echo "<a>Hola ".@$_SESSION['nombre']."</a>"; //Cambiar <p> por (?)
            ?>
            <a href="logout.php?salir=true">Cerrar Sesión</a>
            <?php
            if(@$_SESSION['esAdmin']){?>                    
                    <a href="administrar.php">Administrar Página</a>
            <?php
                }
            }
            ?>
        </div>
        <h2 style="top: 200px; left: 100px">Preguntas sin Respuesta</h2>
        <br><br>
        <?php
            $conexion=conectar();
            if(!$conexion){
                echo "ERROR en conexion BDD";
            }
            $sql="SELECT * FROM chat WHERE respondida='0' ORDER BY fecha_hora ASC";
            $result = $conexion->query($sql);
            echo "<table border=1>";
                    echo "<tr>"
                            . "<th>Mensaje</th>"
                            . "<th>Usuario</th>"
                            . "<th>Fecha-Hora</th>"
                       . "</tr>";
            if($result->num_rows>0){
                //Recorremos cada registro y obtenemos los valores de las columnas especificada
                while($row=$result->fetch_assoc()){
                    echo "<form action='verPregunta.php' method='post'>";
                    echo "<tr>"
                            . "<td><input name='idUsuario' type='hidden' value='".$row['id_usr']."'>"
                            . "<input type='submit' value='".$row['msg']."'></td>"
                            . "<td>".buscarUsrNom($row['id_usr'],$conexion)."</td>"
                            . "<td>".$row['fecha_hora']."</td>"
                       . "</tr>";
                    echo "</form>";
                }
            } else {
                echo "0 results";
            }
            echo "</table>";


            function buscarUsrNom($idusuario,$conexion){
                //Buscar el id de usuario con el nombre de usuario
                $sql2="SELECT * FROM usuarios WHERE id='$idusuario'";
                $result = $conexion->query($sql2);
                $row=$result->fetch_assoc(); 
                $usrNom=$row['nombre'];
                //fin de busqueda
                return $usrNom;
            }
        ?>

        <div class="footer" style="top:900px">
    </body>
</html>