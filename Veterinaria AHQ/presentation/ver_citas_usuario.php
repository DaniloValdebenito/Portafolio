<?php
session_start();

$id_usuario = $_SESSION['usuario'];

$conexion = mysqli_connect("localhost", "root", "", "veterinariaahq");
// Consulta SQL

$consulta = "SELECT nombre,rut,correo, motivo, fecha, estado
FROM solicitudes_cita 
WHERE rut = '$id_usuario'";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $consulta);
?>

<!DOCTYPE html>
<html>

<head>
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
    <title>Administración de Citas</title>
    <link rel="stylesheet" type="text/css" href="../styles/estilo_confirmacion.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../styles/css/estilo_citas.css">

  
</head>

<body>
    <h1>Administración de Citas</h1>

    <table>
        <tr>
            <th>Nombre</th>
            <th>rut</th>
            <th>Correo</th>
            <th>Motivo</th>
            <th>Fecha</th>
            <th>Estado</th>
        </tr>

        <?php
        if ($resultado) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila["nombre"] . "</td>";
                echo "<td>" . $fila["rut"] . "</td>";
                echo "<td>" . $fila["correo"] . "</td>";

                echo "<td>" . $fila["motivo"] . "</td>";
                echo "<td>" . $fila["fecha"] . "</td>";
                echo "<td>" . $fila["estado"] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>

</html>