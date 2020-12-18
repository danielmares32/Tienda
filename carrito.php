<?php
    session_start();
    include('conexionBDD.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <link rel="stylesheet" href="estilo.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>
    <?php
    if(!@$_SESSION['entra']){
    ?>
        <script language="javascript" type="text/javascript">
            window.alert("Debes estar logeado para realizar una compra");
            window.location.href='login.php';
        </script>
    <?php
    }else{
        $usuario=@$_SESSION['idUsuario'];
        if(isset($_POST['cantidad'])){
            $cantidad=$_POST['cantidad'];
            $idProd=$_POST['producto'];
            $conexion=conectar();
            if(!$conexion){
                echo "ERROR en conexion BDD";
            }
            $sql="SELECT * FROM productos WHERE id='".$idProd."'";
            $result = $conexion->query($sql);
            $row=$result->fetch_assoc();
            $nombre=$row['nombre_prod'];
            $precio=$row['precio_prod'];
        } else {
            $idProd='-1';
        }
        
    }
    ?>
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
    <h2 style="top: 200px; left: 100px">Productos Seleccionados para comprar</h2>
    <input id="pagar" type="submit" value="Pagar" style="position: absolute; left:750px; font-size:large">
    <div class="footer" style="position: absolute;">
    <table>
    <script>
        document.addEventListener("DOMContentLoaded",() => {
            <?php if($idProd!="-1"){ ?>
                localStorage.setItem("<?php echo $idProd;?>"+"n","<?php echo $nombre; ?>");
                localStorage.setItem("<?php echo $idProd;?>"+"c","<?php echo $cantidad; ?>");
                localStorage.setItem("<?php echo $idProd;?>"+"p","<?php echo $precio*$cantidad; ?>");
            <?php } ?> 
            var x=[];
            if(localStorage.length==0){
                var h2 = document.createElement('h2');
                h2.textContent="El carrito esta vacio";
                h2.style.position="absolute";
                h2.style.top="300px";
                h2.style.left="100px";
                document.body.appendChild(h2);
                document.querySelector('.footer').style.top=800; 
                document.querySelector('#pagar').style.visibility="hidden";
            } else {
                for(var i=0;i<localStorage.length;i++){
                    x.push(localStorage.key(i));
                }
                x.sort();       
                createTable(x);
                document.querySelector('#pagar').style.top=420+localStorage.length*35;
                document.querySelector('.footer').style.top=800+localStorage.length*35; 
                $('#pagar').click(()=>{
                    var y=[];
                    var idsSet=new Set();
                    for(var i=0;i<x.length;i++){
                        y.push(localStorage.getItem(x[i]));
                        idsSet.add(x[i].substring(0, x[i].length-1));
                    }
                    console.log(y);
                    console.log(Array.from(idsSet));
                    var params = { "prodAcompra[]":y,"ids":Array.from(idsSet) };
                    var str = jQuery.param( params );            
                    window.location.href="compra.php?"+str;
                });
            }
            
            
            function createTable(x) {
                var table = document.createElement('table');
                var tr = document.createElement('tr');
                var td = document.createElement('td');
                td.textContent="Cantidad";
                tr.appendChild(td);
                td = document.createElement('td');
                td.textContent="Nombre";
                tr.appendChild(td);

                td = document.createElement('td');
                td.textContent="A Pagar";
                tr.appendChild(td);

                table.appendChild(tr);
                var num=0;
                for(val of x){
                    if(num%3===0){
                        td = document.createElement('td');
                        let eliminar=boton(val,tr,table,x,true);
                        if(num===0)
                            eliminar.disabled=true;
                        td.appendChild(eliminar);
                        tr.appendChild(td);
                        table.appendChild(tr);
                        tr=document.createElement('tr');
                    }
                    td = document.createElement('td');
                    td.textContent=localStorage.getItem(val);
                    tr.appendChild(td);
                    num++;
                }
                td = document.createElement('td');
                let eliminar=boton(val,tr,table,x,false);
                td.appendChild(eliminar);
                tr.appendChild(td);
                table.appendChild(tr);
                document.body.appendChild(table);
            }

            function boton(val,tr,table,x,posf){
                var eliminar=document.createElement('input');
                let val1,val2,pos;
                eliminar.type='button';
                eliminar.value='Eliminar';
                eliminar.onclick=function() {
                    table.removeChild(tr);
                    if(posf){
                        pos=x.indexOf(val);
                        val=x[pos-1];
                        val1=x[pos-2];
                        val2=x[pos-3];
                    } else {
                        pos=x.indexOf(val);
                        val1=x[pos-1];
                        val2=x[pos-2];
                    }
                    localStorage.removeItem(val);
                    localStorage.removeItem(val1);
                    localStorage.removeItem(val2);
                    window.location.href="carrito.php";
                };
                return eliminar;
            }
        });
    </script>
    </table>
</body>
</html>
    


