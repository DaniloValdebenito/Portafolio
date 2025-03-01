<?php
$host = 'localhost';
$nombre_db = 'veterinariaahq';
$usuario = 'root';
$contrasena = '';

$conexion =mysqli_connect($host, $usuario, $contrasena, $nombre_db);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


?>


