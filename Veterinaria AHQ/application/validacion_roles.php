<?php
require("../data/conexion.php");
// Sanitización para prevenir ataques XSS
$usuario = htmlspecialchars($_POST['usuario']);
$contrasena = htmlspecialchars($_POST['contrasena']);

// Protección contra inyección SQL

$usuario = mysqli_real_escape_string($conexion, $usuario);
$contrasena = mysqli_real_escape_string($conexion, $contrasena);


session_start();

$_SESSION['usuario'] = $usuario;

//consulta preparada para el usuario
$consulta = "SELECT * FROM usuario WHERE rut=? AND contrasena=?";
$stmt = mysqli_prepare($conexion, $consulta);
mysqli_stmt_bind_param($stmt, "ss", $usuario, $contrasena);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $filas = mysqli_fetch_array($resultado);

    if ($filas['id_rol']==1) {
        header("Location: ../index_admin.php");
    } elseif ($filas['id_rol']==2) {
       
        header("Location: ../index_us.php");
    }else {
        echo("No se encontró un rol válido.");
    }
} else {
    
    $mensaje = "Credenciales o usuario no valido¡¡      ";
 
    echo '<script>alert("' . $mensaje . '");</script>';
 
    echo '<script>window.location.href = "../index.html";</script>';


    
 
}

mysqli_close($conexion);
?>