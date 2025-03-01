<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/760fd1d8cf.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" type="text/css" href="../styles/estilo.css">
    <style>
        /* Clases personalizadas para cambiar el color de fondo de la tabla */
        table.custom-table-header thead {
            background-color: #04AA6D;
            /* Color de fondo del encabezado */
            color: white;
            /* Color del texto en el encabezado */
        }

        table.custom-table-header tbody.custom-table-body {
            background-color: white;
            /* Color de fondo del cuerpo de la tabla */
        }

        .custom-table-body {
            margin-right: 50px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"> <!-- Columna de la barra lateral -->
                <?php include "../components/sidebar_paciente.php"; ?>
            </div>
            <div class="col-md-9"> <!-- Columna del contenido principal -->
                <?php
                $row = null;  // Definir $row con un valor predeterminado

                if (isset($_POST['nombre'])) {
                    $nombre = $_POST['nombre'];

                    // Tu conexión a la base de datos ya debería estar establecida en este punto
                    include("../data/conexion.php");

                    $sql = "SELECT id, nombre, especie FROM mascota WHERE nombre LIKE ?";
                    $stmt = $conexion->prepare($sql);
                    $nombre = '%' . $nombre . '%';
                    $stmt->bind_param("s", $nombre);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Verifica si se encontraron resultados
                    if ($result->num_rows > 0) {
                        echo '<h2>Resultados de la búsqueda:</h2>';
                        echo '<div class="table-responsive">';
                        echo '<table class="table table-bordered table-striped custom-table-header">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>ID</th>';
                        echo '<th>Nombre Mascota</th>';
                        echo '<th>Especie</th>';
                        echo '<th>Acciones</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody class="custom-table-body">'; // Se mantiene la clase custom-table-body aquí
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['nombre'] . '</td>';
                            echo '<td>' . $row['especie'] . '</td>';
                            echo '<td>';
                            echo '<a href="../application/pac_logica_eliminar.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>';
                            echo '<a href="pac_carnet.php?nombre=' . $row['nombre'] . '" class="btn btn-primary btn-sm ml-1">Ver Carnet</a>';
                            echo '<a href="pac_editar.php?id=' . $row['id'] . '&nombre=' . $row['nombre'] . '" class="btn btn-primary btn-sm ml-1">Editar</a>';

                            echo '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>';
                    } else {
                        echo '<p>No se encontraron resultados.</p>';
                    }

                    $stmt->close();
                } else {
                    echo '<p>No se ha enviado un nombre para la búsqueda.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
