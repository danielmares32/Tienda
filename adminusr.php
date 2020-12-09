<?php
    session_start();
    include('conexionBDD.php');
    
    $conn=conectar();
    
    if(isset($_POST['borrar'])){
        borrar();
    }
    
    if(isset($_POST['actualizar'])){
        actualizar();
    }
    
    if(isset($_POST['agregar'])){
        agregar();
    }
    
    
    
    function borrar(){
        $nombre=$_POST['nombre'];
         $sql = "DELETE FROM usuarios WHERE nombre='$nombre'";
         
         if(mysqli_query($conn, $sql)){
             header('Location: administrar.php?borrado_exitoso');
         }else{
             header('Location: administrar.php?borrad_no_exitoso');
         }
    }
    
    function actualizar(){        
        $actual=$_POST['nombre'];
        $nuevo=$_POST['nuevo'];
        $email=$_POST['email'];
        $tel=$_POST['telefono'];
        $gustos=$_POST['gustos'];
        $fecha_nac=$_POST['fecha_nac'];
        $calle=$_POST['calle'];    
        $colonia=$_POST['colonia'];
        $ciudad=$_POST['ciudad'];
        $estado=$_POST['estado'];
        $sql = "UPDATE usuarios SET nombre='$nuevo'";
        if($email!=""){
            $sql .= ", email='$email'";
        }        
        if($tel!=""){
            $sql .= ", telefono='$tel'";
        }
        if($gustos!=""){
            $sql .= ", gustos='$gustos'";
        }
        if($fecha_nac!=""){
            $sql .= ", fecha_nac='$fecha_nac'";
        }
        if($calle!=""){
            $sql .= ", calle='$calle'";
        }
        if($colonia!=""){
            $sql .= ", colonia='$colonia'";
        }
        if($ciudad!=""){
            $sql .= ", ciudad='$ciudad'";
        }
        if($estado!=""){
            $sql .= ", estado='$estado'";
        }
        $sql .= " WHERE nombre='$actual'";
        if(mysqli_query($conn, $sql)){
             header('Location: administrar.php?borrado_exitoso');
         }else{
             header('Location: administrar.php?borrado_no_exitoso');
         }
    }
    
    function agregar(){
        $nombre=$_POST['nuevo'];
        $email=$_POST['email'];
        $tel=$_POST['telefono'];
        $gustos=$_POST['gustos'];
        $fecha_nac=$_POST['fecha_nac'];
        $calle=$_POST['calle'];    
        $colonia=$_POST['colonia'];
        $ciudad=$_POST['ciudad'];
        $estado=$_POST['estado'];
        
        $sql1="INSERT INTO usuarios (nombre";
        $sql2="VALUES ('$nombre'";
        
        if($email!=""){
            $sql1 .= ", email";
            $sql2 .= ", '$email'";
        }        
        if($tel!=""){
            $sql1 .= ", telefono";
            $sql2 .= ", '$tel'";
        }
        if($gustos!=""){
            $sql1 .= ", gustos";
            $sql2 .= ", '$gustos'";
        }
        if($fecha_nac!=""){
            $sql1 .= ", fecha_nac";
            $sql2 .= ", '$fecha_nac'";
        }
        if($calle!=""){
            $sql1 .= ", calle";
            $sql2 .= ", '$calle'";
        }
        if($colonia!=""){
            $sql1 .= ", colonia";
            $sql2 .= ", '$colonia'";
        }
        if($ciudad!=""){
            $sql1 .= ", ciudad";
            $sql2 .= ", '$ciudad'";
        }
        if($estado!=""){
            $sql1 .= ", estado";
            $sql2 .= ", '$estado'";
        }
        $sql1 .= ")";
        $sql2 .= ")";
        
        $sql = $sql1+$sql2;
        
        if(mysqli_query($conn, $sql)){
             header('Location: administrar.php?agregado_exitoso');
         }else{
             header('Location: administrar.php?agregado_no_exitoso');
         }
    }
    
?>


