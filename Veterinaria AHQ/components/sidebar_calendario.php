<!DOCTYPE html>
<html>
<head>
    <style>
        /* Estilos para la barra lateral */
        .sidebar {
            height: 100%;
            width: 250px; /* Ancho de la barra lateral */
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333; /* Color de fondo de la barra lateral */
            padding-top: 20px;
            text-align: center; /* Centra horizontalmente el contenido */

        }

        /* Estilos para los elementos de la barra lateral */
        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: white; /* Color de los enlaces */
            display: block;
        }

        /* Cambia el color de fondo cuando el mouse se posa sobre un enlace */
        .sidebar a:hover {
            background-color: #555;
        }

        .logo_vet {
            width: 100px; /* Ajusta el ancho según tus necesidades */
            height: 100px; /* Mantiene la proporción de aspecto */
            border-radius: 510px;
        }

    </style>
</head>
<body>

<!-- Barra lateral -->
<div class="sidebar">
    <img src="../styles/logo.jpg" alt="" class="logo_vet">
    <a href="../index_admin.php">Inicio</a>
    <a href="cal_registro.php">Ingresar Fecha</a>
    <a href="cal_consulta.php">Ver Calendario</a>
    <br>
</div>

<script>
    document.getElementById("btnBackToHome").addEventListener("click", function() {
        window.location.href = "../../inicio.php"; // Reemplaza "inicio.php" con la ruta a tu página de inicio
    });
</script>

</body>
</html>
