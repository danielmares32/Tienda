<?php
    session_start();
    include("ConexionBDD.php");
?>
<!DOCTYPE html>
<html>
<body>
    <?php
            //Reqliza el query
            include('conexionBDD.php');
            $sql = "SELECT * FROM usuarios";
            $conn = conectar();
            $result = mysqli_query($conn, $sql);
            $check = mysqli_num_rows($result);
            @$_SESSION['entra']=false;
            if($_POST){
                //Corrobora que la BD no esté vacía
                if($check>0){
                    while($row = mysqli_fetch_assoc($result)){
                        //Compara información encriptada
                        if($row['nombre']==$_POST['nombre'] && $row['pwd']==md5($_POST['pwd'])){
                            @$_SESSION['entra']=TRUE;
                            @$_SESSION['idUsuario']=$row['id'];
				if($row['esAdmin']){
					@$_SESSION['esAdmin']=TRUE;
				}
                        }
                    }
                }else{
                    @$_SESSION['entra']=false;
                    ?> <p><strong>No estás registrado</strong><br><a href="formaRegistro.php">Click aquí</a></p><?php
                }
            }
    ?>
    
</body>
</html>
