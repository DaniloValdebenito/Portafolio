<?php
require_once("../application/usuario.php");
require_once("../data/conexion.php");
require_once("../application/consulta_perfil.php");


?>

<!DOCTYPE html>
<html>

<head>
    <title>Perfil de Masctotas</title>
    <link rel="stylesheet" type="text/css" href="estilo_confirmacion.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/css/perfil_mascota.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <img src="../img/logo.jpg" class="logo" alt="">
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
                    <a class="nav-link" href="../ver_citas_usuario.php">Mis citas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../solicitu_atencion/index.php">Calendario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../perfil_usuario/index.php">Perfil</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1>Perfil de Mascotas</h1>
    <div class="buscar">
        <form action="busqueda.php" method="GET">
            <input type="text" id="busqueda" name="q" placeholder="Busqueda por nombre" required>
            <button type="submit">Buscar</button>
        </form>

    </div>
    <br>


    <div class="container">
        <div class="row">
            <?php
            if ($resultado && mysqli_num_rows($resultado) > 0) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card card-profile">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <!-- Contenido del título -->
                                    <img src="../img/pets.png" alt="">
                                </h5>
                                <center><h6 class="card-subtitle mb-2 text-muted">
                                    <?PHP echo $fila['nombre'] ?>
                                </h6></center>
                                <p class="card-text">
                                    <!-- Contenido del texto -->
                                </p>
                                <a href="informacion.php" class="card-link">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                $mensaje = "No se encontraron recetas por el momento.";

                echo '<div class="mensaje"><p>' . $mensaje . '</p></div>';
            }
            ?>
        </div>
    </div>
</body>

</html>