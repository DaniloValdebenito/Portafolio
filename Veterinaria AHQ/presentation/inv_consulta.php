<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" type="text/css" href="../styles/estilo.css">
    <style>
        /* Reglas CSS personalizadas para la tabla y centrado */
        .contenedor {
            padding-top: 20px;
        }

        .table-custom {
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;
            background-color: #fff;
            color: #212529;
            border-collapse: collapse;
            border: 1px solid #dee2e6;
            margin-top: 20px;
        }

        .table-custom th,
        .table-custom td {
            padding: 0.75rem;
            vertical-align: top;
            border: 1px solid #dee2e6;
        }

        .table-custom thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            background-color: #04AA6D;
            color: white;
        }

        .table-custom tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-custom tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-custom tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }

        .result-container {
            margin-top: 20px;
        }

        .no-results {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php include "../components/sidebar_inventario.php"; ?>

    <div class="container result-container">
        <?php
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
        
            include("../data/conexion.php");
        
            // Mensaje de depuración
            echo "Entró en el bloque if después de la verificación de POST.";
        
            // Aquí adaptamos la consulta según el tipo seleccionado
            switch ($tipo) {
                case 'medicamento':
                    $tabla = 'medicamentos';
                    break;
                case 'utensilio':
                    $tabla = 'utensilios';
                    break;
                case 'premio':
                    $tabla = 'premios';
                    break;
                default:
                    $tabla = ''; 
            }
        
            // Mensaje de depuración
            echo "Tabla seleccionada: $tabla";
            if (!empty($tabla)) {
                $sql = "SELECT * FROM Insumos WHERE tipo = ? AND nombre LIKE ?";
                $stmt = $conexion->prepare($sql);
                $nombre = '%' . $nombre . '%';
                $stmt->bind_param("ss", $tipo, $nombre);
                $stmt->execute();
                $result = $stmt->get_result();
        
                // Mensaje de depuración
                echo "Ejecutó la consulta.";
        
                if ($result->num_rows > 0) {
                    echo '<h2>Resultados de la búsqueda:</h2>';
                    echo '<table class="table-custom">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Nombre</th>';
                    echo '<th>Cantidad</th>';
                    echo '<th>Contenido</th>';
                    echo '<th>Valor Unit S/IVA</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['nombre'] . '</td>';
                        echo '<td>' . $row['cantidad'] . '</td>';
                        echo '<td>' . $row['contenido'] . ' ' . $row['unidad'] . '</td>';
                        echo '<td>' . $row['valor'] . '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo '<p>No se encontraron resultados.</p>';
                }
        
                $stmt->close();
            } else {
                echo '<p>Tipo de insumo no válido.</p>';
            }
        }
        ?>
    </div>
</body>

</html>
