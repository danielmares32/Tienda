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
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
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
        <h2 style="top: 200px; left: 200px">Preguntar</h2>
        <form action="agregarMsg.php" method="post">
            <input name="pregunta" class="pregunta" type="textarea" placeholder="Escribe tu pregunta">
            <input style="position:absolute;top: 850px;left: 400px;" type="submit" value="Enviar">
        </form>    
        <div class="footer" style="top:900px"></div>
        <h2 style="top: 200px; left: 900px">Chat</h2>
        <div class="pregunta" style="padding:10px;text-align:justify;left:900px; background-color:aliceblue; overflow-y: scroll;" id="respuestas"></div>
        <script>
            $(function(){
                mostrarMsg();
            });

            function removeAllChildNodes(parent) {
                while (parent.firstChild) {
                    parent.removeChild(parent.firstChild);
                }
            }

            function mostrarMsg(){
                $.ajax({
                    url: 'msgBD.php',
                    type: 'POST',
                    success: function(res){
                        const container = document.querySelector('#respuestas');
                        removeAllChildNodes(container);
                        console.log('entre a AJAX');
                        console.log(res.replace(/<p><\/p>/gi,""));
                        var js = JSON.parse(res.replace(/<p><\/p>/gi,""));
                        console.log(js);
                        console.log(js.length);
                        for(var i=0;i<js.length;i++){
                            var h3=document.createElement('h3');
                            h3.style.fontSize="small";
                            h3.innerHTML=js[i].fecha_hora+":"+js[i].msg;
                            document.querySelector('#respuestas').append(h3);
                        }
                    }
                })
            }

            setInterval(function(){
                mostrarMsg();
            },1000);
        </script>    
    </body>
</html>
