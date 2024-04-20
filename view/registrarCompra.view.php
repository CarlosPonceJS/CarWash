<?php include('header.view.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Datos del Cliente</title>
</head>
<body>
    <form action="#" method="post">
        <label for="nombre">Nombre del Dueño:</label>
        <input id="nombreCliente" type="text"  name="nombre" required><br><br>

        <label for="placas">Placas del Vehículo:</label>
        <input id="placasCliente" type="text" name="placas" required><br><br>

        <label for="telefono">Número de Teléfono:</label>
        <input id="telefonoCliente" type="tel" name="telefono" required><br><br>

        <label for="tipo_auto">Tipo de Auto:</label>
        <select id="tipoAutoCliente" name="tipo_auto" required onchange="mostrarCampoExtra()">
            <option value="auto">Auto</option>
            <option value="camioneta">Camioneta</option>
            <option value="camion">Camión</option>
        </select><br><br>

        <div id="campoExtra"></div><br><br>

        <input type="submit" value="Enviar">
    </form>
    <!-- Mover esto al js cuando lo tengamos -->
    <script>
        function mostrarCampoExtra() {
            var tipoAuto = document.getElementById("tipoAutoCliente").value;
            var campoExtra = document.getElementById("campoExtra");

            // Limpiar campo extra antes de mostrar uno nuevo
            campoExtra.innerHTML = "";

            if (tipoAuto === "camioneta") {
                // Campo extra para camioneta (número de puertas)
                campoExtra.innerHTML = '<label for="puertas">Número de Puertas:</label>' +
                                        '<input type="number" id="puertas" name="puertas" required>';
            } else if (tipoAuto === "camion") {
                // Campo extra para camión (longitud del camión)
                campoExtra.innerHTML = '<label for="longitud">Longitud del Camión:</label>' +
                                        '<input type="text" id="longitud" name="longitud" required>';
            }
        }
    </script>
</body>
</html>
