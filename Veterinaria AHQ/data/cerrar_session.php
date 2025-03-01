<?php
session_start();

// Establecer la cabecera Content-Type a application/json
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Destruir la sesión
    session_destroy();
    
    // Responder con un JSON indicando éxito
    echo json_encode(['status' => 'success']);
    exit();
} else {
    // Si la solicitud no es POST, redirigir a la página de inicio
    header("Location: ../index.html");
    exit();
}
?>
