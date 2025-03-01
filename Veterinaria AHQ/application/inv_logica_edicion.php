<?php
include("../data/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el tipo de insumo seleccionado
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';

    // Verificar si el tipo de insumo es válido
    if (!in_array($tipo, ['medicamento', 'utensilio', 'premio'])) {
        echo "Tipo de insumo no válido.";
        exit;
    }

    // Iterar sobre las variables POST para obtener las actualizaciones
    foreach ($_POST as $key => $value) {
        // Verificar si el nombre de la variable contiene "_"
        if (strpos($key, '_') !== false) {
            // Dividir el nombre de la variable en partes usando "_"
            $parts = explode('_', $key);

            // Verificar si hay al menos dos partes y la primera es una acción válida (cantidad, valor, etc.)
            if (count($parts) >= 2 && in_array($parts[0], ['cantidad', 'valor'])) {
                // Obtener el ID de la fila desde la segunda parte del nombre de la variable
                $id = intval(end($parts));

                // Construir la consulta SQL para actualizar la tabla Insumos
                $sql = "UPDATE Insumos SET ";
                $params = [];
                switch ($parts[0]) {
                    case 'cantidad':
                        $sql .= "cantidad = ?";
                        $params[] = $value;
                        break;
                    case 'valor':
                        $sql .= "valor = ?";
                        $params[] = $value;
                        break;
                    // Puedes agregar más casos para otras acciones si es necesario
                }

                // Agregar la parte común de la consulta
                $sql .= " WHERE id = ? AND tipo = ?";
                $params[] = $id;
                $params[] = $tipo;

                // Preparar y ejecutar la consulta
                $stmt = $conexion->prepare($sql);
                if (!$stmt) {
                    echo "Error en la preparación de la consulta: " . $conexion->error;
                    exit;
                }

                // Construir la cadena de tipos dinámicamente
                $types = str_repeat('s', count($params)); // Suponiendo que todos los valores son cadenas
                $stmt->bind_param($types, ...$params);

                // Ejecutar la consulta preparada
                if ($stmt->execute()) {
                    $stmt->close();
                } else {
                    // Manejar el error si la consulta no se ejecuta correctamente
                    echo "Error al actualizar la base de datos: " . $stmt->error;
                    exit;
                }
            }
        }
    }

    // Redireccionar después de procesar los cambios
    header("Location: ../presentation/inv_editar.php");
    exit;
} else {
    // Manejar el error si la solicitud no es POST
    echo "Acceso no válido.";
    exit;
}
?>
