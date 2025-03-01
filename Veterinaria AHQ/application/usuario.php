<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/AHQ');


require("data/conexion.php");

session_start();


$id_usuario = $_SESSION['usuario'];


// Consulta SQL
$consulta = "SELECT contrasena, nombre, rut, id_rol, correo FROM usuario WHERE rut = ?";

// Inicializar la sentencia preparada
if ($stmt = mysqli_prepare($conexion, $consulta)) {
    // Vincular parámetro a la sentencia preparada
    mysqli_stmt_bind_param($stmt, "s", $id_usuario);

    // Ejecutar la sentencia preparada
    if (mysqli_stmt_execute($stmt)) {
        // Vincular variables de resultados
        mysqli_stmt_bind_result($stmt, $contrasena, $nombre, $rut, $id_rol, $correo);

        // Obtener resultados
        while (mysqli_stmt_fetch($stmt)) {
            // Realizar operaciones con los datos
        }
    } else {
        echo "Error en la ejecución de la sentencia preparada: " . mysqli_stmt_error($stmt);
    }

    // Liberar la sentencia preparada
    mysqli_stmt_close($stmt);
} else {
    echo "Error en la preparación de la sentencia: " . mysqli_error($conexion);
}





?>