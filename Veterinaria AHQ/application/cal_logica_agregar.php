<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$nombre_db = "veterinariaahq";

$conn = new mysqli($host, $usuario, $contrasena, $nombre_db);

if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

$fecha_hora = $_POST["fecha_hora"];
$descripcion = $_POST["descripcion"];

$sql = "INSERT INTO citas (fecha_hora, descripcion) VALUES ('$fecha_hora', '$descripcion')";

if ($conn->query($sql) === TRUE) {
    echo "Cita registradaa con exito.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
