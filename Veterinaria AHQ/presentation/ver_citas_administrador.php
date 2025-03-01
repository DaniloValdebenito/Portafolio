
<!DOCTYPE html>
<html>
<head>
    <title>Administración de Citas</title>
    <link rel="stylesheet" type="text/css" href="../styles/estilos/estilo_confirmacion.css">

</head>
<body>
    <h1>Administración de Citas</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>

        <?php

        require("controlador/citas_admin.php");

        ?>

       

    </table>
</body>
</html>