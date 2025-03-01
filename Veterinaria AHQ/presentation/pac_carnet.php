<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    /* Estilo personalizado para la tarjeta de perfil de mascota */
    .perfil-mascota {
        background-color: #f0f0f0;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
        width: 400px;
        margin: 0 auto;
        text-align: center;
    }
    .foto-mascota {
        width: 150px;
        height: 150px;
        border: 2px solid #ddd;
        margin: 0 auto;
        background-image: url('../styles/animal.png'); /* Agrega la imagen de la mascota aquí */
        background-size: cover;
        border-radius: 50%;
    }
    .nombre-mascota {
        font-size: 28px;
        margin-top: 10px;
    }
    .datos-mascota {
        margin-top: 20px;
        text-align: left;
    }
    .datos-mascota p {
        margin: 5px 0;
    }
</style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet de Mascota</title>
    <link rel="stylesheet" type="text/css" href="../styles/estilo.css">
</head>
<body>
    <div class="container mt-4">
        <?php
        include("../application/pac_logica_carnet.php");
        include "../components/sidebar_paciente.php";
        
        if (!empty($mascotaData)) {
            echo '<div class="perfil-mascota">';
            echo '  <div class="foto-mascota"></div>';
            echo '  <div class="nombre-mascota">';
            echo $mascotaData['nombre'];
            echo '  </div>';
            echo '  <div class="datos-mascota">';
            echo '      <p>Especie: ' . $mascotaData['especie'] . '</p>';
            echo '      <p>Raza: ' . $mascotaData['raza'] . '</p>';
            echo '      <p>Fecha de Registro: ' . $mascotaData['fecha_registro'] . '</p>';
            echo '      <p>Nombre del Dueño: ' . $mascotaData['nombre_dueño'] . '</p>';
            echo '      <p>Correo del Dueño: ' . $mascotaData['correo'] . '</p>';
            echo '      <p>Teléfono del Dueño: ' . $mascotaData['telefono'] . '</p>';
            echo '      <p>Comentarios: ' . $mascotaData['comentarios'] . '</p>';
            echo '  </div>';
            echo '</div>';
        } else {
            echo 'Mascota no encontrada.';
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
