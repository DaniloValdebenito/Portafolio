<?php
require_once("../application/usuario.php");
require_once("../data/conexion.php");

$consulta = "SELECT rut, nombre, especie, raza, edad FROM mascota WHERE rut = ?";
// Preparar la consulta
if ($stmt = mysqli_prepare($conexion, $consulta)) {
    // Asignar valor al placeholder (?)
    mysqli_stmt_bind_param($stmt, "s", $valor_rut);
    $valor_rut = $id_usuario; // Reemplaza 'valor_del_rut_de_la_mascota' con el valor real

    // Ejecutar la consulta
    if (mysqli_stmt_execute($stmt)) {
        $resultado = mysqli_stmt_get_result($stmt);

        // Obtener los resultados
        if ($fila = mysqli_fetch_assoc($resultado)) {
            $rut = $fila['rut'];
            $nombre = $fila['nombre'];
            $especie = $fila['especie'];
            $raza = $fila['raza'];
            $edad = $fila['edad'];
        } else {
            echo "No se encontraron resultados para el rut proporcionado.";
        }
    } else {
        echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
    }

    // Cerrar la sentencia
    mysqli_stmt_close($stmt);
} else {
    echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/css/estilo_informacion.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .card23 {
            /* Estilos de tu tarjeta */
            width: 300px;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
        }

        #form-container {
            display: none;
            /* Ocultar el formulario inicialmente */
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <img src="../styles/img/logo.jpg" class="logo" alt="">
        <h1 class="titulo-barra">Veterinaria AHQ</h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index_us.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ver_citas_usuario.php">Mis citas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index_atencion.php">Calendario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index_usuario.php">Perfil</a>
                </li>
            </ul>
        </div>
    </nav>
    <center>
        <div class="card">
            <div class="card-body">
                <h1>Perfil de mascota</h1>
                <div class="mascot-details">
                    <img src="../styles/img/pets.png" alt="Imagen de la mascota" class="mascot-image">
                    <div class="mascot-info">
                        <h2 class="card-title">Nombre de la mascota :
                            <?php echo $fila['nombre'] ?>
                        </h2>
                        <p class="card-subtitle">Tipo de mascota:
                            <?php echo $fila['raza'] ?>
                        </p>
                        <p class="card-text">Edad:
                            <?php echo $fila['edad'] ?>
                        </p>
                        <p class="card-text">especie:
                            <?php echo $fila['especie'] ?>
                        </p>
                        <p class="card-text">especie:
                            <?php echo $fila['especie'] ?>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </center>






</body>

</html>