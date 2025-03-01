<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$nombre_db = "veterinariaahq";

$conn = new mysqli($host, $usuario, $contrasena, $nombre_db);

if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

$sql = "SELECT fecha_hora, descripcion FROM citas"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $citas = array();
    while ($row = $result->fetch_assoc()) {
        $cita = array(
            "title" => "disponible",
            "start" => $row["fecha_hora"] 
        );
        array_push($citas, $cita);
    }
    echo json_encode($citas);
} else {
    echo "[]";
}

$conn->close();
?>
