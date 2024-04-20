<?php include('header.view.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
</head>
<body>
    <h1>Crear Empleado</h1>
    <form action="#" method="post">
        <label for="nombre">Nombre:</label>
        <input id="btnNombreEmpleado" type="text" id="nombre" name="nombre" required><br><br>

        <label for="usuario">Usuario:</label>
        <input id="btnUsuarioEmpleado" type="text" id="usuario" name="usuario" required><br><br>

        <label for="correo">Correo:</label>
        <input id="btnCorreoEmpleado" type="email" id="correo" name="correo" required><br><br>

        <label for="contrasena">Contraseña:</label>
        <input id="btnPswEmpleado" type="password" id="contrasena" name="contrasena" required><br><br>

        <button type="submit" name="accion" value="registrar">Registrar</button>
        <button id="btnGuardarEmpleado" type="button" onclick="location.href='tu_pagina_anterior.html'">Regresar</button>
    </form>
</body>
</html>
