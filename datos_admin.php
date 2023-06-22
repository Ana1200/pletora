<?php
 
    $id_usuario = $_SESSION['id'];
    $result = usuario($id_usuario);
    $datos = Array();
    while($row = mysqli_fetch_array($result)){
        $datos[]=$row;
    }
    foreach($datos as $producto){
        $nombre = $producto['nombre'];
    }
?>