<?php
    session_start();
    include('conexionBDD.php');
    
    
    
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
        $conn=conectar();
        $nombre=$_POST['nombre'];
        $sql = "DELETE FROM productos WHERE nombre='$nombre'";
         
         if(mysqli_query($conn, $sql)){
             header('Location: administrar.php?borrado_exitoso');
         }else{
             header('Location: administrar.php?borrado_no_exitoso');
         }
    }
    
    function actualizar(){
        $conn=conectar();
        $nombre=$_POST['nombre'];
        $nuevo=$_POST['nuevo'];
        $cat=$_POST['categoria'];
        $precio=$_POST['precio'];
        $desc=$_POST['descripcion'];
        $imagen= getImagen();
        $sql = "UPDATE usuarios SET nombre_prod='$nuevo'";
        
        if($cat!=""){
            $sql .= ", categoria_prod='$cat'";
        }        
        if($precio!=""){
            $sql .= ", precio_prod='$precio'";
        }
        if($desc!=""){
            $sql .= ", descripcion_prod='$desc'";
        }
        if($imagen!=""){
            $sql .= ", imagen_prod='$imagen'";
        }       
        $sql .= " WHERE nombre='$nombre'";
        if(mysqli_query($conn, $sql)){
             header('Location: administrar.php?actualizado_exitoso');
         }else{
             header('Location: administrar.php?actualizado_no_exitoso');
         }
    }
         
    function agregar(){
        $conn=conectar();
        $nombre=$_POST['nuevo'];
        $cat=$_POST['categoria'];
        $precio=$_POST['precio'];
        $desc=$_POST['descripcion'];
        $imagen=getImagen();
        
        
        $sql1="INSERT INTO productos (nombre_prod";
        $sql2="VALUES ('$nombre'";
        
        if($cat!=""){
            $sql1 .= ", categoria_prod";
            $sql2 .= ", '$cat'";
        }        
        if($precio!=""){
            $sql1 .= ", precio_prod";
            $sql2 .= ", '$precio'";
        }
        if($desc!=""){
            $sql1 .= ", descripcion_prod";
            $sql2 .= ", '$desc'";
        }
        if($imagen!=""){
            $sql1 .= ", imagen_prod";
            $sql2 .= ", '$imagen'";
        }       
        $sql1 .= ")";
        $sql2 .= ")";
        
        $sql = $sql1.$sql2;
        
        if(mysqli_query($conn, $sql)){
             header('Location: administrar.php?agregado_exitoso');
         }else{
             header('Location: administrar.php?agregado_no_exitoso');
         }
        
    }
    
    function getImagen(){
        $check= getimagesize($_FILES['imagen']['tmp_name']);
        if($check !== false){
            $imagen=$_FILES['imagen']['tmp_name'];
            $imgContenido=addslashes(file_get_contents($imagen));
        }
        return $imgContenido;
    }