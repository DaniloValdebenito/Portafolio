<?php
    include("../application/pac_logica_edicion.php");

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/estilo.css">
    

</head>
<body>
    
    <div class="container">
        <form method="post" action="../application/pac_logica_edicion.php">
            <input type="hidden" name="id" value="<?php echo $id_mascota; ?>">
            <div class="form-group">
                <label for="nombre">Nombre de la Mascota:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="especie">Especie:</label>
                <input type="text" class="form-control" id="especie" name="especie" value="<?php echo $row['especie']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nombre_dueño">Nombre del Dueño:</label>
                <input type="text" class="form-control" id="nombre_dueño" name="nombre_dueño" value="<?php echo $row['nombre_dueño']; ?>" required>
            </div>
            <div class="form-group">
                <label for="raza">Raza:</label>
                <input type="text" class="form-control" id="raza" name="raza" value="<?php echo $row['raza']; ?>" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $row['edad']; ?>" required>
            </div>
            <div class="form-group">
                <label for="fecha_registro">Fecha de Registro:</label>
                <input type="text" class="form-control" id="fecha_registro" name="fecha_registro" value="<?php echo $row['fecha_registro']; ?>" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo del Dueño:</label>
                <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $row['correo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono del Dueño:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $row['telefono']; ?>" required>
            </div>
            <div class="form-group">
                <label for="comentarios">Comentarios:</label>
                <textarea class="form-control" id="comentarios" name="comentarios" rows="4"><?php echo $row['comentarios']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
