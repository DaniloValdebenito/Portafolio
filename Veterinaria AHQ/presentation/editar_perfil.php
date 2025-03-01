<?php

require("../application/usuario.php");



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>actualizar datos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/css/editar_usuario.css">
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
                    <a class="nav-link" href="../index.php">Inicio</a>
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
    <div class="container mb-5">
        <h1>Actualizar datos</h1>
        <?php require_once("../application/procesar_edicion.php"); ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre </label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $correo ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Contraseña</label>
                <input type="text" class="form-control" id="contrasena" name="contrasena"
                    value=" <?php echo $contrasena ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
           

        </form>
        <a href="../index_us.php"><button  class="btn btn-warning">Volver</button></a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>