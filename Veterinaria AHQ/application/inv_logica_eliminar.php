<?php
// Configura los encabezados para evitar el almacenamiento en caché
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

include("../data/conexion.php");

// ...

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
    $id_item = $_GET['id'];
    $tipo_item = isset($_GET['tipo']) ? $_GET['tipo'] : '';  // Asegúrate de obtener el tipo de item desde tu página

    // Asegúrate de definir $tabla según el tipo de item
    $tabla = 'Insumos';

    if (empty($tipo_item)) {
        // Manejar el caso en que $tipo_item está vacío
        echo "Error: Tipo de item no proporcionado.";
        exit;
    }

    // Verifica si se ha enviado el parámetro 'confirmar' para confirmar la eliminación
    if (isset($_GET['confirmar']) && $_GET['confirmar'] === '1') {
        // Tu conexión a la base de datos ya debería estar establecida en este punto

        $sql = "DELETE FROM $tabla WHERE id = ?";
        
        $stmt = $conexion->prepare($sql);
        if (!$stmt) {
            // Manejar el caso en que la preparación de la consulta falla
            echo "Error en la preparación de la consulta: " . $conexion->error;
            exit;
        }

        $stmt->bind_param("i", $id_item);

        // Ejecuta la consulta y verifica si se eliminó correctamente
        if ($stmt->execute()) {
            // El elemento se eliminó correctamente
            header("Location: ../presentation/inv_editar.php");
            exit();
        } else {
            // Hubo un error al eliminar el elemento
            echo "Error al ejecutar la consulta: " . $stmt->error;
            exit;
        }
    } else {
        // Mostrar un mensaje de confirmación
        echo '<script>
            if (confirm("¿Estás seguro de que deseas eliminar este elemento?")) {
                window.location.href = "inv_logica_eliminar.php?id=' . $id_item . '&tipo=' . $tipo_item . '&confirmar=1";
            } else {
                window.location.href = "../presentation/inv_editar.php";
            }
        </script>';
    }
}

// ...
?>
