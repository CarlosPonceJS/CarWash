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
    <title>Formulario de Datos del Cliente</title>
</head>
<body>
    <?php include('header.view.php'); ?>
   

    <form class="bodyRegister" action="#" method="post">
        <div class="crudEmpleados"> 
        <h1 class="titulo">Registrar Compra</h1>
        <p id="mensaje-exito" class="mensaje-exito"></p>
        <div class="input-group">
            <input id="nombreCliente" type="text" name="nombre" required>
            <label for="nombre">Nombre del Dueño:</label>
            <br><br>
        </div>

        <div class="input-group">
            <input id="placasCliente" type="text" name="placas" required>
            <label for="">Placas del Vehículo:</label><br><br>
        </div>
        <div class="input-group">
            <input id="telefonoCliente" type="tel" name="telefono" required>
            <label for="">Número de Teléfono:</label><br><br>
        </div>

        <div class="input-group">
        <select id="tipoAutoCliente" name="tipo_auto" class="input-select" required onchange="mostrarCampoExtra()">
          <option value="" disabled selected>Tipo de Vehículo</option>
          <option value="auto">Auto</option>
          <option value="camioneta">Camioneta</option>
          <option value="camion">Camión</option>
        </select>
        </div>

        <div class="file-upload">
         <label for="file-input" class="file-upload-label">Seleccionar foto del auto</label>
         <input required id="file-input" type="file" accept=".jpg, .jpeg, .png" />
         <span id="file-name" class="file-name">Nombre del archivo: </span>
        </div>


        
        <div class="input-group" id="campoExtra">
        </div>
        
       

        <input id="btnSubmit" class="btnSubmit" type="submit" value="Registrar">
        <button class="btnCancel" > Cancelar </button>
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
        function mostrarCampoExtra() {
    var tipoAuto = document.getElementById("tipoAutoCliente").value;
    var campoExtra = document.getElementById("campoExtra");

    // Limpiar campo extra antes de mostrar uno nuevo
    campoExtra.innerHTML = "";

    if (tipoAuto === "camioneta") {
        // Campo extra para camioneta 
        campoExtra.innerHTML = 
            '<input type="number" id="puertas" name="puertas" required>' + '<label for="puertas">Número de Puertas:</label>'+
            '<p>Precio: <span id="precioSpan">Insertar precio aquí</span></p>';
    } else if (tipoAuto === "camion") {
        // Campo extra para camion
        campoExtra.innerHTML = 
            '<input type="text" id="longitud" name="longitud" required>' + '<label for="longitud">Longitud del Camión:</label>' +
            '<p>Precio: <span id="precioSpan">Insertar precio aquí</span></p>';
    } else {
        // Para cualquier otro tipo de auto 
        campoExtra.innerHTML = '<p>Precio: <span id="precioSpan">Insertar precio aquí</span></p>';
    }
}

const fileInput = document.getElementById('file-input');
const fileName = document.getElementById('file-name');

fileInput.addEventListener('change', function() {
    if (fileInput.files.length > 0) {
        fileName.textContent = 'Nombre del archivo: ' + fileInput.files[0].name;
    } else {
        fileName.textContent = 'Nombre del archivo: ';
    }
});



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
