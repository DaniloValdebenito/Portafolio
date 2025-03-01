<?php
require_once("usuario.php");
require_once("../data/conexion.php");

// Variable que contiene la URL a la que deseas redirigir
$urlRedireccion = "../index_us.php"; // Reemplaza "url_a_tu_pagina.php" con la URL a la que quieres redirigir

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Consulta SQL para actualizar el usuario (cambiar 'id_usuario' por el identificador del usuario que deseas actualizar)
    $sql = "UPDATE usuario SET nombre='$nombre', correo='$correo',contrasena='$contrasena' WHERE rut = $id_usuario"; // Modificar según tu estructura de base de datos

    if ($conexion->query($sql) === TRUE) {
        echo '<div style="padding: 10px; background-color: #d4edda; border-color: #c3e6cb; color: #155724;">Usuario actualizado exitosamente</div>';
        
        // Redireccionar después de 3 segundos
        echo '<script>
                setTimeout(function() {
                    window.location.href = "' . $urlRedireccion . '";
                }, 3000); // Cambia 3000 a la cantidad de milisegundos que desees (por ejemplo, 5000 para 5 segundos)
              </script>';
    } else {
        echo "Error al actualizar el usuario: " . $conexion->error;
    }
}

$conexion->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/editar_usuario.css">
</head>
<body>
    
</body>
</html>