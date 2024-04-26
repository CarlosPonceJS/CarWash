<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalizer.css">
    <link rel="stylesheet" href="../css/style.css">
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
