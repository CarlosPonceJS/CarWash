<?php include('header.view.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Empleado</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalizer.css">
    <link rel="stylesheet" href="../css/style.css">
    
</head>
<body>
    <h1>Actualizar Empleado</h1>
    <form action="#" method="post">
        <input type="hidden" id="id" name="id" value="ID_DEL_EMPLEADO_A_ACTUALIZAR">

        <label for="nombre">Nombre:</label>
        <input type="text" id="btnNombreEmpleado" name="nombre" required><br><br>

        <label for="usuario">Usuario:</label>
        <input type="text" id="btnUsuarioEmpleado" name="usuario" required><br><br>

        <label for="correo">Correo:</label>
        <input type="email" id="btnCorreoEmpleado" name="correo" required><br><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="btnPswEmpleado" name="contrasena" required><br><br>

        <button type="submit" name="accion" value="actualizar">Actualizar</button>
        <button type="button" onclick="location.href='tu_pagina_anterior.html'">Cancelar</button>
    </form>
</body>
</html>
