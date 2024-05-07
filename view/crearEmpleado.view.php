<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/normalizer.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Formulario para agregar empleado</title>
</head>
<body>
<?php include('header.view.php'); ?>
   

    <form class="bodyRegister" action="#" method="post">
        <div class="crudEmpleados"> 
        <h1 class="titulo">Registrar empleado</h1>
        <p id="mensaje-exito" class="mensaje-exito"></p>
        <div class="input-group">
            <input id="nombreEmpleado" type="text" name="nombre" required>
            <label for="nombre">Nombre del empleado:</label>
            <br><br>
        </div>

        <div class="input-group">
            <input id="nombreUsuario" type="text" name="usuario" required>
            <label for="usuario">Nombre de usuario:</label><br><br>
        </div>
        <div class="input-group">
            <input id="correo" type="email" name="correo" required>
            <label for="correo">Correo:</label><br><br>
        </div>

        <div class="input-group">
            <input id="contrasena" type="text" name="contrasena" required>
            <label for="contrasena">Contraseña:</label><br><br>
        </div>

        <input id="btnSubmit" class="btnSubmit" type="submit" value="Registrar">
        <button id="btnCancel" type="button" onclick="location.href='mostrarUsuariosEmpleados'">Cancelar</button>

        </div>

        <div id="modal" class="modal">
            <div class="modal-content">
             <div class="modal-header">
                <h2>ATENCIÓN</h2>
             </div>
                <div class="modal-body">
                    <p>¿Estás seguro de añadir este registro?</p>
            </div>
            <div class="modal-footer">
            <button id="confirmar" class="btnSubmit">Añadir</button>
            <button id="cancelar" class="btnCancel">Cancelar</button>
            </div>
            </div>
        </div>

       
    </form>

    <script>

document.getElementById('btnSubmit').addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('modal').style.display = 'flex';
});

document.getElementById('cancelar').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'none';
});

document.getElementById('confirmar').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'none';
    document.getElementById('mensaje-exito').innerText = 'Añadido correctamente';
    document.getElementById('mensaje-exito').style.display = 'block';
    setTimeout(function() {
        document.getElementById('mensaje-exito').style.display = 'none';
    }, 5000);
});



// Obtener todos los campos requeridos
const camposRequeridos = document.querySelectorAll('[required]');

// Función para verificar si todos los campos requeridos tienen información
function verificarCampos() {
    return Array.from(camposRequeridos).every(campo => campo.value.trim() !== '');
}

// Función para habilitar o deshabilitar el botón de "Registrar"
function actualizarEstadoBoton() {
    const btnSubmit = document.getElementById('btnSubmit');
    btnSubmit.disabled = !verificarCampos();
}


actualizarEstadoBoton();

// Escuchar cambios en los campos requeridos
camposRequeridos.forEach(campo => {
    campo.addEventListener('input', actualizarEstadoBoton);
});

// Escuchar el evento submit del formulario
document.querySelector('form').addEventListener('submit', function(e) {
    if (!verificarCampos()) {
        e.preventDefault();
        alert('Por favor, complete todos los campos requeridos.');
    }
});



    </script>
</body>
</html>
