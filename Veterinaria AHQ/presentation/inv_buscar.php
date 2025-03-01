<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Insumo</title>
    <link rel="stylesheet" type="text/css" href="../styles/estilo.css">
</head>
<body>
    <?php
    session_start();

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recuperar los valores del formulario
        $nombre = $_POST["nombre"];
        $tipo = $_POST["tipo"];
    
        // Construir la consulta SQL basada en los valores del formulario
        if (empty($nombre)) {
            // Si el campo de búsqueda está vacío, traer todos los registros
            $sql = "SELECT * FROM ";
    
            // Seleccionar la tabla correspondiente según el tipo
            if (empty($tipo)) {
                $sql .= "medicamento, utensilio, premio";
            } else {
                $sql .= "$tipo";
            }
        } else {
            // Si se proporciona un nombre, incluirlo en la consulta
            $sql = "SELECT * FROM $tipo WHERE nombre LIKE '%$nombre%'";
    
            // Si se selecciona un tipo, incluirlo en la consulta
            if (!empty($tipo)) {
                $sql .= " AND tipo = '$tipo'";
            }
        }
    }

    include("../components/sidebar_inventario.php");
    ?>
    
    <div class="container">
        <form method="post" action="inv_consulta.php">
        <div class="form-group">
            <label for="nombre">Nombre del Insumo (Deje vacío este campo para consultar todos los items de cada categoríat):</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>

        <div class="form-group">
            <label for="tipo">Tipo de Insumo:</label>
            <select class="form-control" id="tipo" name="tipo">
                <option value="utensilio">Utensilio</option>
                <option value="premio">Premio</option>
                <option value="medicamento">Medicamento</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    </div>
</body>
</html>
