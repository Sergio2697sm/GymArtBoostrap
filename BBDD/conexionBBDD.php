<?php
function conectarUsuarios() {
    $conexion=mysqli_connect("localhost","root","","art");
    $error=$conexion->connect_errno;

    if($error !=null) {
        echo "<p>Error $error conectando a la base de datos: $conexion->connect_errno</p>";
        exit();
    }else {
        mysqli_set_charset($conexion,"utf8");
        return $conexion;
    }
}
?>