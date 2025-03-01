
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/estilo_admin.css">
    <title>Programar Cita</title>
</head>
<body>
    <?php

        include "../components/sidebar_calendario.php"; 
    ?>
    <h1>Programar Cita</h1>
    <form action="../application/cal_logica_agregar.php" method="POST">
        <label for="fecha_hora">Fecha y hora de la cita:</label>
        <input type="datetime-local" name="fecha_hora" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" required>
        <br>
        <input type="submit" value="Programar horario">
    </form>
    
</body>
    
</html>


