<?php include('headerAdmin.view.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/normalizer.css">
    <link rel="stylesheet" href="./css/styleJaz.css">
    <title>CRUD</title>
    <style>
        
    </style>
</head>
<body>
    <br>
    <div class="grid-container div container">
        <div class="first-column">
            <img src="images/Trofeo.png" alt="" class="my-image">
        </div>
        <div class="">
            <span class="spani">Nombre:</span><span>#</span><br>
            <span class="spani">Nombre de usuario:</span><span>#</span><br>
            <span class="spani">Carros lavados:</span><span>#</span><br>
            <span class="spani">Correo:</span><span>#</span><br>
            <br><button class="btni" style="background-color: #5783BC;" >Reporte PDF</button></td>
        </div>
    </div>
    <div class="div container" >
        <span>Responsable</span>
        <div class="search-container">
            <input type="text" name="search" id="search"  placeholder="Buscar responsable..." >
            <img src="images/ImgBuscar.png" alt="Buscar" class="search-icon">
        </div>
    </div>
    <br>
    <div class="div">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Costo</th>
                    <th>Responsable</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se mostrarían los datos de la tabla -->
                <tr>
                    <td>Ejemplo Nombre</td>
                    <td>Ejemplo Placa</td>
                    <td>Ejemplo Modelo</td>
                    <td>Ejemplo Costo</td>
                    <td>Ejemplo Responsable</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div class="div container">
    <button class="btn" style="background-color: #5783BC;" >Reporte del historial de tareas</button>
    </div>
    <script>
        function search() {
            var searchValue = document.getElementById('search').value;
            // Realizar búsqueda con searchValue
            console.log('Buscar:', searchValue);
        }
    </script>
</body>
</html>
