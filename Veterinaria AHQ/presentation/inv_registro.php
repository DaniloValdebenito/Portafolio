<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Insumo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles/estilo.css">
</head>
<body>
    <?php
    include ("../components/sidebar_inventario.php");
    ?>

    <div class="divregistro">
        <form id="formulario" action="../application/inv_logica_registro.php" method="post" onsubmit="return calcularConIVA()">
            <img src="../styles/logo.jpg" alt="" class="logo_vet">
            <h2>Agregar Nuevo Insumo</h2>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo:</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="Medicamento">Medicamento</option>
                    <option value="Premio">Premio</option>
                    <option value="Utensilio">Utensilio</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido:</label>
                <input type="text" class="form-control" id="contenido" name="contenido" oninput="validarNumero(this)" required>
            </div>

            <div class="mb-3">
                <label for="unidad" class="form-label">Unidad:</label>
                <select name="unidad" id="unidad" class="form-control">
                    <option value="ML">ML</option>
                    <option value="UNI">UNI</option>
                    <option value="DOSIS">DOSIS</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" oninput="validarNumero(this)" required>
            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor Unit S/IVA:</label>
                <input type="text" class="form-control" id="valor" name="valor" oninput="validarNumero(this)" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>

            <!-- Botón para enviar el formulario -->
            <input type="submit" value="Agregar" class="btn btn-primary">
        </form>

        <script>
            function validarNumero(input) {
                input.value = input.value.replace(/[^\d]/g, ''); // Reemplaza cualquier cosa que no sea un número por una cadena vacía
            }
        </script>
    </div>
</body>
</html>
