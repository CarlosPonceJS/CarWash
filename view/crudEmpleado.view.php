<?php include('header.view.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!-- Lo saque de un repositorio jijiji -->
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            padding: 5px;
            margin-right: 5px;
        }

        input[type="submit"], .btn {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover, .btn:hover {
            background-color: #45a049;
        }

        .btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <h1>CRUD - Usuarios</h1>
    <form action="#" method="get" onsubmit="return false;">
        <input type="text" name="search" id="search" placeholder="Buscar..." onkeydown="if (event.key === 'Enter') search()">
        <button class="btn" onclick="window.location.href='pagina_registro_empleados.html'">Registro de Empleados</button>
    </form>
    <br>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Nombre de Usuario</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se mostrarían los datos de la tabla -->
            <tr>
                <td>Ejemplo Nombre</td>
                <td>Ejemplo Usuario</td>
                <td>ejemplo@correo.com</td>
                <td>********</td>
                <td>
                    <button class="btn edit">Editar</button>
                    <button class="btn delete">Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>

    <script>
        function search() {
            var searchValue = document.getElementById('search').value;
            // Realizar búsqueda con searchValue
            console.log('Buscar:', searchValue);
        }
    </script>
</body>
</html>
