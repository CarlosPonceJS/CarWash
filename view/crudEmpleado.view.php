<?php include('header.view.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/normalizer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="./css/styleJaz.css">
    <title>CRUD</title>
    <style>
        
    </style>
</head>
<body>
    <br><br>
    <div class="div container" >
        <span>Empleado</span>
        <div class="search-container">
            <input type="text" name="search" id="search"  placeholder="Buscar empleado...">
            <img src="images/ImgBuscar.png" alt="Buscar" class="search-icon">
        </div>
        <a class="btnc" style="background-color: #D9D9D9;" href="crearEmpleado">
          <img src="images/ImgAgregarUsuario.png" style="height: 25px; vertical-align: middle;">
        </a>
    </div>
    <br><br>
    <div class="div">
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
    <tr class="animate__animated animate__slideInUp" id="empleado1">
        <td>Ejemplo Nombre</td>
        <td>Ejemplo Usuario</td>
        <td>ejemplo@correo.com</td>
        <td>********</td>
        <td class="container">
            <button class="btni Editar" style="background-color: #7DF89F;">Editar</button>
            <button class="btni" style="background-color: #F87D7D;" onclick="mostrarModal(this, 'empleado1')">Eliminar</button>
        </td>
    </tr>
</tbody>

        </table>
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>¡ATENCIÓN!</h2>
            </div>
            <div class="modal-body">
                <p id="modal-message">El empleado se eliminará permanentemente. ¿Desea continuar?</p>
            </div>
            <div class="modal-footer">
                <button id="eliminarEmpleado" class="btnModal" onclick="cerrarModal()">Continuar</button>
                <button id="cancelar" class="btnCancel" onclick="cerrarModal()">Cancelar</button>
            </div>
        </div>
    </div>
    <script>
        function mostrarModal(button, actividadId) {
            document.getElementById('modal').style.display = 'flex';
        }

        function cerrarModal() {
            document.getElementById('modal').style.display = 'none';
        }

        <script>
    document.addEventListener('DOMContentLoaded', function() {
        var rows = document.querySelectorAll('tbody tr');
        rows.forEach((row, index) => {
            setTimeout(() => {
                row.classList.add('animate__slideInUp');
            }, index * 100); // Cambia el valor de 100 si deseas ajustar la velocidad de la animación
        });
    });
</script>


    </script>
</body>
</html>
