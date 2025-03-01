<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    // El usuario no ha iniciado sesión, redirigirlo a index.html
    header("Location: ../index.html");

    exit(); // Asegura que se detenga la ejecución del script después de la redirección.
}

$id_usuario = $_SESSION['usuario'];
$conexion = mysqli_connect("localhost", "root", "", "veterinariaahq");

$consulta = "SELECT rut,id_rol FROM usuario WHERE nombre='$id_usuario'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    // Verifica si la consulta devolvió al menos una fila.
    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $id_rol = $fila['id_rol'];
        $rut = $fila['rut'];

        if ($id_rol == 1) {
            // El rol es igual a 1, puedes mostrar los datos.
        } else {
            // El rol no es igual a 1, redirige a index.html
            header("Location: ../index.html");

            exit(); // Asegura que se detenga la ejecución del script después de la redirección.
        }
    } else {
        echo "No se encontró un usuario con el nombre '$id_usuario'.";
    }
    // Liberar el resultado cuando hayas terminado con él.
    mysqli_free_result($resultado);
} else {
    // Manejar el caso en que la consulta no tuvo éxito.
    echo "Error en la consulta: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos cuando hayas terminado.
mysqli_close($conexion);
?>