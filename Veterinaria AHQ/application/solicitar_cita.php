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
$citas = array();

while ($row = $result->fetch_assoc()) {
    $fecha_hora = $row["fecha_hora"];
    $descripcion = $row["descripcion"];

    $consulta_disponibilidad = "SELECT estado FROM solicitudes_cita WHERE fecha = '$fecha_hora'";
    $resultado_disponibilidad = $conn->query($consulta_disponibilidad);

    $estado = "Disponible"; // Establece como disponible por defecto
    $color = "green";
    $editable = true; // Por defecto, el evento es editable
    $url = "../presentation/formulario_solicitud.php?fecha_hora=" . $fecha_hora;

    if ($resultado_disponibilidad->num_rows > 0) {
        $fila_disponibilidad = $resultado_disponibilidad->fetch_assoc();
        $estado = strtolower($fila_disponibilidad["estado"]); // Convertir a minúsculas
        if ($estado === "aceptada") {
            $color = "red";
            $estado = "Tomada";
            $editable = false; // No se puede editar
            $url = ""; // Borra la URL
        } elseif ($estado === "pendiente") {
            $color = "orange";
            $editable = false; // No se puede editar
            $url = ""; // Borra la URL
        }
    }

    $cita = array(
        "title" => $estado,
        "start" => $fecha_hora,
        "description" => $descripcion,
        "url" => $url,
        "color" => $color,
        "editable" => $editable // Establece la propiedad editable
    );

    array_push($citas, $cita);
}

echo json_encode($citas);

$conn->close();
?>
