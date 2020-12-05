<?php
    session_start();
    include('conexionBDD.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php
    //if(!@$_SESSION['entra']){
    ?>
    <!--        <script language="javascript" type="text/javascript">
                window.alert("Debes estar logeado para realizar una compra");
            </script>
            <a href="login.php">Iniciar Sesión</a> -->
    <?php
    //}else{
        $usuario=@$_SESSION['idUsuario'];
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
        
    //}
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
        <a href="usuario.php">Usuario</a>
    </div>
    <h2 style="top: 150px; left: 100px">Productos Seleccionados para comprar</h2>
    <table>
    <script>
        document.addEventListener("DOMContentLoaded",() => {
            localStorage.setItem("<?php echo $idProd;?>"+"n","<?php echo $nombre; ?>");
            localStorage.setItem("<?php echo $idProd;?>"+"c","<?php echo $cantidad; ?>");
            localStorage.setItem("<?php echo $idProd;?>"+"p","<?php echo $precio*$cantidad; ?>");
            var x=[];
            for(var i=0;i<localStorage.length;i++){
                x.push(localStorage.key(i));
            }
            x.sort();          

            createTable(x);

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
                    if(num%3==0){
                        console.log('entre');
                        td = document.createElement('td');
                        td.textContent="Eliminar";
                        tr.appendChild(td);
                        table.appendChild(tr);
                        tr=document.createElement('tr');
                    }
                    td = document.createElement('td');
                    td.textContent=localStorage.getItem(val);
                    console.log(localStorage.getItem(val));
                    tr.appendChild(td);
                    num++;
                }
                td = document.createElement('td');
                td.textContent="Eliminar";
                tr.appendChild(td);
                table.appendChild(tr);
                document.body.appendChild(table);
            }
        });
    </script>
    </table>
</body>
</html>
    


