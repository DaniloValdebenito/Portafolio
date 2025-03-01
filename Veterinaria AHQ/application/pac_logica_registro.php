<?php

if (!empty($_POST["Registrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["especie"]) and !empty($_POST["raza"]) and !empty($_POST["edad"]) and !empty($_POST["fecha_registro"]) and !empty($_POST["comentarios"]) ) {
        
        $_nombre = $_POST["nombre"];
        $_especie = $_POST["especie"];
        $_raza = $_POST["raza"];
        $_edad = $_POST["edad"];
        $_fecha_registro = $_POST["fecha_registro"];
        $_comentarios = $_POST["comentarios"];

        $sql=$conexion->query("INSERT INTO mascota(nombre,especie,raza,edad,fecha_registro,comentarios)values ('$_nombre','$_especie','$_raza','$_edad','$_fecha_registro','$_comentarios')");
        if ($sql== 1) {
            echo '<div class="alert alert-success">Mascota registrada correctamente</div> ';
            sleep(3);   
        }

    }else{
        echo"Falta algun campo por llenar ";
    }  
}


?>