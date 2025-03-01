<?php
$fecha_hora_cita = isset($_GET['fecha_hora']) ? $_GET['fecha_hora'] : "";

require("../application/usuario.php");



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Solicitar Cita</title>
    <link rel="stylesheet" href="../styles/estilos/estilo_formulario_solicitud.css">
</head>

<body>

    <div class="container">
        <h1>Solicitar Cita</h1>
        <img src="../img/logo.jpg" alt="" class="logo">
        <form method="post">

            <?php
            require("../application/confirmacion.php");

            ?>
            <label for="fecha_hora">Fecha:</label>
            <input type="text" name="fecha_hora" id="fecha_hora"
                value="<?php echo !empty($fecha_hora_cita) ? $fecha_hora_cita : 'Fecha y hora no especificadas'; ?>"
                readonly>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo " $nombre " ?>" readonly><br>

            <label for="nombre">Rut:</label>
            <input type="text" name="rut" value="<?PHP echo "$rut" ?>" readonly><br>

            <label for="correo">Correo Electrónico:</label>
            <input type="email" name="correo" value="<?PHP echo "$correo" ?>" readonly><br>

            <label for="motivo">Motivo de la Cita:</label>
            <select name="opciones" id="opciones">
                <option value="" selected>Opciones: </option>
                <option value="vacunas">vacunas</option>
                <option value="cuidado dental">Cuidado dental</option>
                <option value="consulta general">consulta general</option>
                <option value="peluqeria">Peluqueria</option>
                <option value="otro">Otro</option>
                <!-- Puedes añadir más opciones si lo necesitas -->
            </select>

            <textarea name="motivo" id="motivo" required></textarea><br>

            <script>
                const selectElement = document.getElementById("opciones");
                const textareaElement = document.getElementById("motivo");

                selectElement.addEventListener("change", function () {
                    const selectedValue = selectElement.value;

                    if (selectedValue === "otro") {
                        // Si se selecciona "Otro", habilitar el textarea para que el usuario pueda escribir
                        textareaElement.value = ""; // Limpiar el contenido del textarea
                        textareaElement.disabled = false; // Habilitar el textarea
                        textareaElement.focus(); // Darle foco al textarea para que sea más visible al usuario
                    } else {
                        // Si se selecciona otra opción, mostrar ese valor en el textarea y deshabilitarlo
                        textareaElement.value = selectedValue;
                        textareaElement.disabled = true;
                    }
                });
            </script>

            <input type="submit" name="enviar" value="Enviar Solicitud">
            <a href="../index_atencion.php"> <button class="boton-volver" type="button">Volver</button></a>

            
        </form>
    </div>



</body>

</html>