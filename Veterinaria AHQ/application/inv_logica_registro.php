<?php
include("../data/conexion.php");

$mensaje = "";

if (!empty($_POST["nombre"]) && !empty($_POST["tipo"]) && !empty($_POST["cantidad"]) && !empty($_POST["contenido"])) {
    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];
    $cantidad = $_POST["cantidad"];
    $descripcion = $_POST["descripcion"];
    $contenido = $_POST["contenido"];
    $valor = $_POST["valor"];
    $unidad = $_POST["unidad"];

    $sql = $conexion->query("INSERT INTO Insumos (nombre, cantidad, descripcion, contenido, valor, unidad, tipo) VALUES ('$nombre', '$cantidad', '$descripcion', '$contenido', '$valor', '$unidad', '$tipo')");

    if ($sql) {
        $mensaje = 'Insumo registrado correctamente';
    } else {
        $mensaje = 'Error al registrar el insumo';
    }
} else {
    $mensaje = 'Error: Datos del formulario incompletos';
}

session_start();
$_SESSION['mensaje_inventario'] = $mensaje;

header("Location: ../presentation/inv_registro.php");
exit;
?>
