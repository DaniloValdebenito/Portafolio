<?php
include("../data/conexion.php");

if (isset($_GET['nombre'])) {
    $nombre_mascota = $_GET['nombre'];

    $sql = "SELECT * FROM mascota WHERE nombre = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $nombre_mascota);
    $stmt->execute();
    $result = $stmt->get_result();

    $mascotaData = []; // Arreglo para almacenar los datos de la mascota

    // Verifica si se encontró la mascota en la base de datos
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $mascotaData = $row; // Almacena los datos de la mascota
    }
    
    $stmt->close();
}
?>
