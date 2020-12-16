<?php
    session_start();
    include('conexionBDD.php');
    $conexion=conectar();
    if(!$conexion){
        echo "ERROR en conexion BDD";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chat</title>
        <link rel="stylesheet" href="estilo.css">
        <style>
            .pregunta{
                width: 500px; 
                height:500px; 
                text-align:center; 
                position:absolute; 
                left:200px; 
                top:300px; 
                font-family:Arial, Helvetica, sans-serif; 
                font-size:large;
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
            <a href="chat.php">Chat</a>
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
        <?php $idUsr=$_POST['idUsuario']; ?>
        <h2 style="top: 200px; left: 200px">Preguntar</h2>
        <form action="agregarMsgAdmin.php" method="post">
            <input name="idUsuario" type="hidden" value="<?php echo $idUsr; ?>">
            <input name="pregunta" class="pregunta" type="textarea" placeholder="Escribe tu pregunta">
            <input style="position:absolute;top: 850px;left: 400px;" type="submit" value="Enviar">
        </form>    
        <div class="footer" style="top:900px"></div>
        <h2 style="top: 200px; left: 900px">Chat con <?php echo buscarusr($idUsr,$conexion); ?> </h2>
        <div class="pregunta" style="padding:10px;text-align:justify;left:900px; background-color:aliceblue" name="respuestas">
            <?php
                $sql="SELECT * FROM chat WHERE id_usr='$idUsr' ORDER BY fecha_hora ASC";
                $result = $conexion->query($sql);
                if($result->num_rows>0){
                    //Recorremos cada registro y obtenemos los valores de las columnas especificada
                    while($row=$result->fetch_assoc()){
                        echo "<h3 style='font-size:small'>".$row['fecha_hora'].":".$row['msg']."</h3>";
                    }
                } else {
                    echo "0 results";
                }

                function buscarusr($idusuario,$conexion){
                    //Buscar el id de usuario con el nombre de usuario
                    $sql2="SELECT * FROM usuarios WHERE id='$idusuario'";
                    $result = $conexion->query($sql2);
                    $row=$result->fetch_assoc(); 
                    $usr=$row['nombre'];
                    //fin de busqueda
                    return $usr;
                }
            ?>
        </div>
    </body>
</html>