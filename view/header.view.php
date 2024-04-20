<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
</head>
<body>
    <?php
    // Suponiendo que tienes una variable $permisos que contiene el nivel de permisos del usuario actual
    // Esto es solo un ejemplo, debes obtener los permisos de tu aplicación
   

    require_once('controller/header.php');
    $permisos = 1;

    // Carga el header según los permisos del usuario
    echo cargarHeader($permisos);
    ?>
</body>
</html>
