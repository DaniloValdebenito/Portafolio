<!DOCTYPE html>
<html>
<head>
    <title>Veterinaria AHQ</title>
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
    <img src="styles/logo.jpg" alt="" class="logo_vet">
    <a href="presentation/pac_inicio.php">Pacientes</a>
    <a href="presentation/pac_registro.php">Recetas</a>
    <a href="presentation/cal_registro.php">Calendario</a>
    <a href="presentation/inv_inicio.php">Inventario</a>

    <a href="data/cerrar_session.php">Cerrar sesión</a>
  
</div>



</body>
</html>
