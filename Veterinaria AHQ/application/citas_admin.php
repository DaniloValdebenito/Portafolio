<?php

include("../data/conexion.php");


// Procesar acciones de aceptar o rechazar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["aceptar"])) {
        $cita_id = $_POST["aceptar"];
        // Realiza la lógica para actualizar el estado de la cita como "aceptada" en la base de datos
        $sql = "UPDATE solicitudes_cita SET estado = 'aceptada' WHERE id = $cita_id";
        if ($conexion->query($sql) === TRUE) {
            // Redirigir a la página de administración después de aceptar la cita
            header("Location: ver_citas2.php");
        } else {
            echo "Error al aceptar la cita: " . $conexion->error;
        }
    } elseif (isset($_POST["rechazar"])) {
        $cita_id = $_POST["rechazar"];
        // Realiza la lógica para actualizar el estado de la cita como "rechazada" en la base de datos
        $sql = "UPDATE solicitudes_cita SET estado = 'rechazada' WHERE id = $cita_id";
        if ($conexion->query($sql) === TRUE) {
            // Redirigir a la página de administración después de rechazar la cita
            header("Location: ver_citas2.php");
        } else {
            echo "Error al rechazar la cita: " . $conexion->error;
        }
    }
}




// Procesar acciones de aceptar o rechazar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST["aceptar"])) {
$cita_id = $_POST["aceptar"];
// Realiza la lógica para actualizar el estado de la cita como "aceptada" en la base de datos
$sql = "UPDATE solicitudes_cita SET estado = 'aceptada' WHERE id = $cita_id";
if ($conexion->query($sql) === TRUE) {
    // Redirigir a la página de administración después de aceptar la cita
    header("Location: ver_citas2.php");
} else {
    echo "Error al aceptar la cita: " . $conexion->error;
}
} elseif (isset($_POST["rechazar"])) {
$cita_id = $_POST["rechazar"];
// Realiza la lógica para eliminar la cita si el estado es "rechazada"
$sql = "DELETE FROM solicitudes_cita WHERE id = $cita_id AND estado = 'rechazada'";
if ($conexion->query($sql) === TRUE) {
    // Redirigir a la página de administración después de eliminar la cita
    header("Location: ver_citas2.php");
} else {
    echo "Error al rechazar y eliminar la cita: " . $conexion->error;
}
}
}





// Consulta SQL para recuperar las citas
$sql = "SELECT id, nombre, fecha, estado FROM solicitudes_cita";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["fecha"] . "</td>";
        echo "<td>" . $row["estado"] . "</td>";
        echo "<td>
            <form method='post'>
                <button type='submit' name='aceptar' value='" . $row["id"] . "'>Aceptar</button>
                <button type='submit' name='rechazar' value='" . $row["id"] . "'>Rechazar</button>
            </form>
        </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No hay citas registradas.</td></tr>";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>