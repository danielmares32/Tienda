<?php
    session_start();
    
    //Valida que los campos no estén vacíos
    if($_POST['nombre']!="" && $_POST['pwd']!=""){
        $usuario=$_POST['nombre'];
        //Encriptación por MD5
        $contra=md5($_POST['pwd']);

	$apellidos=$_POST['apellidos'];
	$fecha_nac=$_POST['fecha_nac'];
	$email=$_POST['email'];
	$tel=$_POST['telefono'];
	$gustos=$_POST['gustos'];
	$calle=$_POST['calle'];
	$colonia=$_POST['colonia'];
	$ciudad=$_POST['ciudad'];
	$estado=$_POST['estado'];

        
        //Código SQL
        $sql = "INSERT INTO usuarios(usr,apellidos,fecha_nac,email,telefono,gustos,calle,colonia,ciudad,estado,pwd)
	VALUES ('$usuario', '$apellidos','$fecha_nac','$email','$tel','$gustos','$calle','$colonia','$ciudad','$estado','$pwd');"

        //Realiza el query y regresa a la página principal, indicando si se registró correctamente
	$conn=conectar();
	mysqli_query($conn, $sql);
        header('Location: index.php?correct');
    }else{
        //Indica en la URL si el registro no se pudo realizar
        header('Location: index.php?incorrect');
    }
