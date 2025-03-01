<?php
require("../data/conexion.php");
$consulta = "SELECT rut,nombre, especie, raza, edad
FROM mascota 
WHERE rut = ?";

if ($stmt = mysqli_prepare($conexion, $consulta)) {
    mysqli_stmt_bind_param($stmt, "s", $id_usuario);

    if (mysqli_stmt_execute($stmt)) {
        $resultado = mysqli_stmt_get_result($stmt);
    } else {
        echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
    }

} else {
    echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
}

mysqli_close($conexion);

?>