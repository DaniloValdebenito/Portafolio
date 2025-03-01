<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/760fd1d8cf.js" crossorigin="anonymous"></script>    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Insumo</title>
    <link rel="stylesheet" type="text/css" href="../styles/estilo.css">
    <style>
        /* Reglas CSS personalizadas para la tabla y centrado */
        .contenedor {
            padding-top: 20px;
            text-align: center;
        }

        .table-container {
            width: 200%;
            margin: 0 auto;
        }

        .table-custom {
            width: 200%;
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

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input {
            width: 40px !important;
            text-align: center;
            margin: 0 5px;
        }

        .form-group button {
            background-color: #04AA6D;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #047049;
        }

        .form-group input[type="text"] {
            width: 80px;
        }

        .form-group input[type="submit"] {
            background-color: #047049;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #034733;
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <?php
        include "../components/sidebar_inventario.php";

        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';

            include("../data/conexion.php");

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

            if (!empty($tabla)) {
                $sql = "SELECT * FROM Insumos WHERE tipo = ? AND nombre LIKE ?";
                $stmt = $conexion->prepare($sql);
                $nombre = '%' . $nombre . '%';
                $stmt->bind_param("ss", $tipo, $nombre);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo '<h2>Edición de Inventario:</h2>';
                    echo '<form class="inv" method="post" action="../application/inv_logica_edicion.php">';

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
                        echo '<tr data-id="' . $row['id'] . '">';
                        echo '<td>' . $row['nombre'] . '</td>';
                        echo '<td>';
                        echo '<button type="button" onclick="decrementarCantidad(' . $row['id'] . ')">-</button>';
                        echo '<input type="text" name="cantidad_' . $row['id'] . '" value="' . $row['cantidad'] . '" oninput="validarNumero(this)" style="width: 70px;">';
                        echo '<button type="button" onclick="incrementarCantidad(' . $row['id'] . ')">+</button>';
                        echo '</td>';
                        echo '<td>' . $row['contenido'] . ' ' . $row['unidad'] . '</td>';
                        echo '<td>';
                        echo '<label for="valor_' . $row['id'] . '">Valor:</label>';
                        echo '<input type="text" name="valor_' . $row['id'] . '" value="' . $row['valor'] . '" oninput="validarNumero(this)">';
                        echo '</td>';
                        echo '<td>';
                        echo '<a href="../application/inv_logica_eliminar.php?id=' . $row['id'] . '&tipo=' . $tipo . '&confirmar=true" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>';
                        echo '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                    echo '<input type="hidden" name="tipo" value="' . $tipo . '">';
                    echo '<button type="submit" class="btn btn-primary">Guardar Cambios</button>';
                    echo '</form>';
                } else {
                    echo '<p>No se encontraron resultados.</p>';
                }

                $stmt->close();
            } else {
                echo '<p>Tipo de insumo no válido.</p>';
            }
        }
        ?>

        <script>
            function incrementarCantidad(id) {
                console.log("Incrementar Cantidad - ID: " + id);
                var cantidadInput = document.querySelector('input[name="cantidad_' + id + '"]');
                cantidadInput.value = parseInt(cantidadInput.value, 10) + 1;
            }

            function decrementarCantidad(id) {
                console.log("Decrementar Cantidad - ID: " + id);
                var cantidadInput = document.querySelector('input[name="cantidad_' + id + '"]');
                var cantidad = parseInt(cantidadInput.value, 10);
                if (cantidad > 0) {
                    cantidadInput.value = cantidad - 1;
                }
            }

            function validarNumero(input) {
                console.log("Validar Número - Valor: " + input.value);
                input.value = input.value.replace(/[^0-9]/g, '');
            }

            function eliminarFila(id) {
                // Confirmar la eliminación
                if (confirm("¿Estás seguro de que deseas eliminar este elemento?")) {
                    // Realizar la eliminación

                    // Agregar código para enviar la solicitud al servidor
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "../application/inv_logica_eliminar.php?delete_" + id, true);
                    xhr.send();
                    var fila = document.querySelector('tr[data-id="' + id + '"]');
                    fila.style.display = 'none';

                        
                    }
            }
            
        </script>
    </div>
</body>

</html>
