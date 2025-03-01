<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Mascota</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles/estilo.css">
</head>
<body>
  
    <h1></h1>
    <div class="divregistro">
        <form method="post">
          <?php
          include("../data/conexion.php");
          include("../application/pac_logica_registro.php");
          include ("../components/sidebar_paciente.php");
          ?>
           <img src="../styles/logo.jpg" alt="" class="logo_vet" >          
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre de la Mascota</label>
              <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Especie</label>
              <input type="text" class="form-control" id="especie" name="especie" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Raza</label>
                <input type="text" class="form-control" id="raza" name="raza" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" >Edad</label>
                <input type="text" class="form-control" id="edad" name="edad" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Fecha de Registro</label>
                <input type="date" id="fecha_registro" name="fecha_registro" required><br><br>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Comentarios</label>
                <textarea name="comentarios" id="comentarios" cols="52" rows="10"></textarea>
              </div>
            <div class="mb-3 form-check">
              
            </div>
            <div class="boton">
                <button  type="submit" name="Registrar" id="registrar" value="ok" class="btn btn-primary">Registrar</button>
            </div>
          </form>
    </div>
</body>
</html>
