<?php
include("../data/conexion.php");

// ...

if (!empty($_POST["enviar"])) {
    // Verificar que los campos obligatorios no estén vacíos
    if (!empty($_POST["nombre"]) && !empty($_POST["correo"]) && !empty($_POST["fecha_hora"]) && !empty($_POST["rut"])) {
        $nombre = $_POST["nombre"];
        $rut = $_POST["rut"];
        $correo = $_POST["correo"];
        $fecha_hora = $_POST["fecha_hora"];

        // Verifica si la opción seleccionada es "Otro" y asigna el valor correspondiente al campo de motivo
        $motivo = ($_POST["opciones"] === "otro") ? htmlspecialchars($_POST["motivo"]) : $_POST["opciones"];


        // Validar que el campo de motivo no esté vacío si se selecciona "otro"
        if ($_POST["opciones"] === "otro" && empty($_POST["motivo"])) {
            echo '<div class="alert alert-danger">El campo de motivo no puede estar vacío si selecciona "Otro".</div>';
        } else {
            // Realizar la inserción en la base de datos si todo está correcto
            $sql = "INSERT INTO solicitudes_cita (nombre, rut, correo, motivo, fecha) VALUES ('$nombre','$rut', '$correo', '$motivo', '$fecha_hora')";

            $result = $conexion->query($sql);

            if ($result) {
                echo '<div class="alert alert-success">Solicitud registrada correctamente</div>';
                echo '<script type="text/javascript">
                        setTimeout(function(){
                            window.location.href = "../index_usuario.php";
                        }, 4000); // Redirigir después de 2 segundos (4000 ms)
                      </script>';
            } else {
                echo '<div class="alert alert-danger">Error al registrar la receta: ' . $conexion->error . '</div>';
            }
        }
    } else {
        // Mostrar un mensaje de error si algún campo obligatorio está vacío
        echo '<div class="alert alert-danger">Todos los campos son obligatorios.</div>';
    }
}




?>