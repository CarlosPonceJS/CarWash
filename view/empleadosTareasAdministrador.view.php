<?php include('header.view.php'); ?>

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
    <title>Tabla de Tareas</title>
</head>
<body>
    <h1>Tabla de Tareas</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Placa del Auto</th>
                <th>Modelo</th>
                <th>Costo</th>
                <th>Responsable</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nombre del Cliente 1</td>
                <td>Placa del Auto 1</td>
                <td>Modelo del Auto 1</td>
                <td>Costo de la Tarea 1</td>
                <td>Responsable 1</td>
            </tr>
            <tr>
                <td>Nombre del Cliente 2</td>
                <td>Placa del Auto 2</td>
                <td>Modelo del Auto 2</td>
                <td>Costo de la Tarea 2</td>
                <td>Responsable 2</td>
            </tr>
            <!-- Agrega más filas según necesites -->
        </tbody>
    </table>

    <button onclick="imprimirPDF()" style="margin-top: 20px;">Imprimir PDF de la tabla</button>

    <script>
        function imprimirPDF() {
            // Aquí iría la lógica para generar y descargar el PDF
            alert('Generando y descargando PDF...');
        }
    </script>
</body>
</html>
