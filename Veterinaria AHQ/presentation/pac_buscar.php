<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Mascotas</title>
    <link rel="stylesheet" type="text/css" href="../styles/estilo.css">
</head>
<body>
<?php
            session_start();

            // Verifica si hay una variable de sesión que indica éxito de la edición
            if (isset($_SESSION["edicion_exitosa"]) && $_SESSION["edicion_exitosa"]) {
                echo '<p class="mensaje-exito">Mascota editada correctamente</p>';
                // Limpia la variable de sesión
                unset($_SESSION["edicion_exitosa"]);
            }

          include ("../components/sidebar_paciente.php");
          ?>
    
    <div class="container">
        <form method="post" action="pac_consulta.php">
            <div class="form-group">
                <label for="nombre">Nombre de la Mascota:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
</body>
</html>
