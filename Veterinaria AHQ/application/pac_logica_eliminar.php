<?php
// Configura los encabezados para evitar el almacenamiento en caché
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

include("../data/conexion.php");

if (isset($_GET['id'])) {
    $id_mascota = $_GET['id'];

    // Verifica si se ha enviado el parámetro 'confirmar' para confirmar la eliminación
    if (isset($_GET['confirmar']) && $_GET['confirmar'] === '1') {
        // Tu conexión a la base de datos ya debería estar establecida en este punto

        $sql = "DELETE FROM mascota WHERE id = ?";
        
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $id_mascota);

        // Ejecuta la consulta y verifica si se eliminó correctamente
        if ($stmt->execute()) {
            // La mascota se eliminó correctamente
            header("Location: ../presentation/pac_consulta.php");
            exit();
        } else {
            // Hubo un error al eliminar la mascota
            header("Location: ../presentation/pac_consulta.php?error=1");
            exit();
        }
    } else {
        // Mostrar un mensaje de confirmación
        echo '<script>
            if (confirm("¿Estás seguro de que deseas eliminar esta mascota?")) {
                window.location.href = "pac_logica_eliminar.php?id=' . $id_mascota . '&confirmar=1";
            } else {
                window.location.href = "../presentation/pac_consulta.php";
            }
        </script>';
    }
}
?>
