<?php
include("../data/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $id = isset($_POST["id"]) ? $_POST["id"] : '';
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
    $especie = isset($_POST["especie"]) ? $_POST["especie"] : '';
    $nombre_dueño = isset($_POST["nombre_dueño"]) ? $_POST["nombre_dueño"] : '';
    $raza = isset($_POST["raza"]) ? $_POST["raza"] : '';
    $edad = isset($_POST["edad"]) ? $_POST["edad"] : '';
    $fecha_registro = isset($_POST["fecha_registro"]) ? $_POST["fecha_registro"] : '';
    $correo = isset($_POST["correo"]) ? $_POST["correo"] : '';
    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : '';
    $comentarios = isset($_POST["comentarios"]) ? $_POST["comentarios"] : '';

    // Verifica que las variables necesarias estén definidas
    if ($id !== '' && $nombre !== '' && $especie !== '' && $nombre_dueño !== '') {
        // Realiza la actualización en la base de datos
        $sql = "UPDATE mascota SET nombre=?, especie=?, nombre_dueño=?, raza=?, edad=?, fecha_registro=?, correo=?, telefono=?, comentarios=? WHERE id=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssssssssi", $nombre, $especie, $nombre_dueño, $raza, $edad, $fecha_registro, $correo, $telefono, $comentarios, $id);

        if ($stmt->execute()) {
            session_start();
            $_SESSION["edicion_exitosa"] = true;
            header("Location: ../presentation/pac_buscar.php");
            exit();
        } else {
            // Redirecciona de vuelta a la página de resultados con un mensaje de error
            header("Location: pac_buscar.php?error_editar=1");
            exit();
        }
    } else {
        echo "Datos del formulario incompletos.";
        exit();
    }
}

if (isset($_GET['id'])) {
    $id_mascota = $_GET['id'];

    // Consulta para obtener todos los datos de la mascota
    $sql = "SELECT * FROM mascota WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_mascota);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Resto de tu código...
    } else {
        echo 'No se encontraron resultados para esta mascota.';
    }

    $stmt->close();
}
?>
