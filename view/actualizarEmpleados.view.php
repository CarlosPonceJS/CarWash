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
    <title>Formulario para actualizar empleado</title>
</head>
<body>
<?php include('header.view.php'); ?>
<?php if (isset($resultado) && is_array($resultado) && count($resultado) >= 5): ?>
    <?php $idUsuario = htmlspecialchars($resultado[0]); ?>
    <?php $nombre = htmlspecialchars($resultado[1]); ?>
    <?php $usuario = htmlspecialchars($resultado[2]); ?>
    <?php $correo = htmlspecialchars($resultado[3]); ?>
    <?php $contrasena = htmlspecialchars($resultado[4]); ?>
    <?php endif; ?>

    <?php if (isset($resultado)): ?>
    <form class="bodyRegister" action="#" method="post">
        <div class="crudEmpleados"> 
        <h1 class="titulo">Actualizar empleado</h1>
        <p id="mensaje-exito" class="mensaje-exito"></p>
        <div class="input-group">
            <input type="text" id="nombreEmpleado" name="nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>"><br><br>
            <label for="nombre">Nombre del empleado:</label>
            <br><br>
        </div>

        <div class="input-group">
            <input type="text" id="nombreUsuario" name="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>"><br><br>
            <label for="usuario">Nombre de usuario:</label><br><br>
        </div>
        <div class="input-group">
            <input type="email" id="correo" name="correo" value="<?php echo isset($correo) ? $correo : ''; ?>"><br><br>
            <label for="correo">Correo:</label><br><br>
        </div>

        <div class="input-group">
            <input type="password" id="contrasena" name="contrasena" value="<?php echo isset($contrasena) ? $contrasena : ''; ?>"><br><br>
            <label for="contrasena">Contraseña:</label><br><br>
        </div>
        <input type="hidden" id="idUsuarios" name="idUsuarios" value="<?php echo isset($idUsuario) ? $idUsuario : ''; ?>">
        <input id="btnSubmit" class="btnSubmit" type="submit" value="Registrar">
        <button type="button" onclick="location.href='mostrarUsuariosEmpleados'">Cancelar</button>
        </div>

        <div id="modal" class="modal">
            <div class="modal-content">
             <div class="modal-header">
                <h2>ATENCIÓN</h2>
             </div>
                <div class="modal-body">
                    <p>¿Estás seguro de actualizar este registro?</p>
            </div>
            <div class="modal-footer">
            <button id="confirmar" class="btnSubmit">Actualizar</button>
            <button id="cancelar" class="btnCancel">Cancelar</button>
            </div>
            </div>
        </div>

       
    </form>
    <?php endif; ?>
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


function verificarCampos() {
    return Array.from(camposRequeridos).every(campo => campo.value.trim() !== '');
}

// habilitar o deshabilitar el botón de "Registrar"
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
