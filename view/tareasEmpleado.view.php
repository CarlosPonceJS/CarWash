<?php include('header.view.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Carros a Lavar</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Placas</th>
                <th>Dueño</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="ruta-de-la-imagen-1.jpg" alt="Carro 1"></td>
                <td>ABC-123</td>
                <td>Juan Pérez</td>
                <td><button>Realizar</button></td>
            </tr>
            <tr>
                <td><img src="ruta-de-la-imagen-2.jpg" alt="Carro 2"></td>
                <td>DEF-456</td>
                <td>María Rodríguez</td>
                <td><button>Realizar</button></td>
            </tr>
            <!-- Agregar logica de la base de datos, tiren paro equipo de back end-->
        </tbody>
    </table>
</body>
</html>
