<?php
$conexion = mysqli_connect("localhost", "root", " ", "registro_db");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>