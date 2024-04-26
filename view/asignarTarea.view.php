<?php include('header.view.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&display=swap" rel="stylesheet">
    <title>CRUD</title>
    <!-- Lo saque de un repositorio jijiji -->
    <style>
        table {
            border-collapse: collapse; 
            width: 100%;
            border: none;
        }
        th, td {
            border-left: 1px solid #0F5F8C; 
            border-bottom: 1px solid #0F5F8C;
            text-align: center;
            padding: 8px;
            color: #5783BC;
            vertical-align: middle;
            font-family: 'Comfortaa', cursive;
            font-weight: 700;
            font-size: 16px;
        }
        th:first-child, td:first-child {
            border-left: none; 
        }
        tr:last-child td {
            border-bottom: none; 
        }
        .btn {
            border: 2px solid #7DF89F; 
            border-radius: 6px;
            width: 150px; 
            color: white;
            font-family:  'Comfortaa', cursive; 
            font-size: 16px; 
        }
        .container {
            display: flex;
            justify-content: center;
        }
        .div {
            margin-top: 10px;     /* Margen superior */
            margin-right: 70px;   /* Margen derecho */
            margin-bottom: 5px;   /* Margen inferior */
            margin-left: 70px;    /* Margen izquierdo */
        }
        select {
            width: 300px;          
            padding: 3px;         
            border: 2px solid #5783BC;
            border-radius: 6px;   
            background-color: white; 
            font-family:  'Comfortaa', cursive; 
            font-size: 16px;      
            cursor: pointer;       
        }
        select option {
            font-family:  'Comfortaa', cursive; 
            color: #5783BC;
        }
        @media (max-width: 768px) {
            .div {    
                margin-right: 10px; 
                margin-left: 10px; 
            }
            table, th, td, .btn{
                font-size: 14px;
            }
            select {
                width: 200px;
                font-size: 14px;
            }
        }
        @media (max-width: 480px) {
            .div {    
                margin-right: 5px; 
                margin-left: 5px; 
            }
            table, th, td, .btn {
                font-size: 12px;
            }
            select, .btn {
            width: 100px;
            font-size: 12px; 
        }
        }
    </style>
</head>
<body>
    <br><br><br>
    <div class="div">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Responsable</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se mostrarían los datos de la tabla -->
                <tr>
                    <td>Ejemplo Nombre</td>
                    <td>Ejemplo Placa</td>
                    <td>Ejemplo Modelo</td>
                    <td>    
                        <select name="empleadoEncargado" id="empleadoEncargado">
                            <option value="Juan">Juan</option>
                            <option value="Ulises">Ulises</option>
                            <option value="Carlos">Carlos</option>
                        </select>
                    </td>
                    <td><button class="btn" style="background-color: #7DF89F;" >Asignar</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>