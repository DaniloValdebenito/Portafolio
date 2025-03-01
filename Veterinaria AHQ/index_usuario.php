<?php
require("application/usuario.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="styles/css/usuario.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <img src="styles/img/logo.jpg" class="logo" alt="">
        <h1 class="titulo-barra">Veterinaria AHQ</h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index_us.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="presentation/ver_citas_usuario.php">Mis citas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index_atencion.php">Calendario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index_usuario.php">Perfil</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="perfil">
        <h1 class="titulo">Perfil</h1>

        <div class="seccion">
            <div class="icono">
                <img src="styles/img/usuario.png" alt="Icono de usuario">
            </div>
            <div class="datos">
                <h2 class="subtitulo">Datos Personales</h2>
                <table class="tabla-datos">
                    <tr>
                        <td>Nombre: </td>
                        <td>
                            <?php echo $nombre ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Edad:</td>
                        <td>30 años</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>
                            <?php echo $correo ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Contraseña:</td>
                        <td>
                            <?php echo $contrasena ?>
                        </td>
                    </tr>

                    <!-- Añade más filas según los datos que desees mostrar -->
                </table>
                <a href="presentation/editar_perfil.php"><button class="boton-actualizar"> actualizar Datos</button></a>
            </div>

        </div>

    </div>

</body>

</html>