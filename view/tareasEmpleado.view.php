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
    <link rel="stylesheet" href="./css/style.css">
    <title>Tabla de Carros a Lavar</title>

    <style>
        .btnSubmit {
            animation: none !important;
        }
    </style>
</head>

<body>
    <div id="tablaContenedor" style="display: none;">
        <table class="contenedor">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Placas</th>
                    <th>Dueño</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <tr id="carro1" class="animate__animated">
            <td><img src="./images/autoPrueba.webp" alt="Carro 1" class="auto-imagen" style="max-width: 20rem; height: auto;"></td>
                <td>ABC-123</td>
                <td>Juan Pérez</td>
                <td><button class="btn btnSubmit" onclick="mostrarModal(this, 'carro1')">Realizar</button></td>
            </tr>
            <tr id="carro2" class="animate__animated tr-oculto">
            <td><img src="./images/autoPrueba.webp" alt="Carro 1" class="auto-imagen" style="max-width: 20rem; height: auto;"></td>
                <td>DEF-456</td>
                <td>María Rodríguez</td>
                <td><button class="btn btnSubmit" onclick="mostrarModal(this, 'carro2')">Realizar</button></td>
            </tr>



                <!-- Agregar lógica de la base de datos, tiren paro equipo de back end-->
            </tbody>
        </table>
    </div>


    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>ATENCIÓN</h2>
            </div>
            <div class="modal-body">
                <p id="modal-message">¿Estás seguro que quieres empezar la actividad?</p>
            </div>
            <div class="modal-footer">
                <button id="confirmarTarea" class="btnModal" onclick="empezarActividad()">Empezar</button>
                <button id="cancelar" class="btnCancel" onclick="cerrarModal()">Cancelar</button>
            </div>
        </div>
    </div>

    <div id="modalFinalizar" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>ATENCIÓN</h2>
            </div>
            <div class="modal-body">
                <p id="modal-message-finalizar">¿Estás seguro de finalizar la actividad?</p>
            </div>
            <div class="modal-footer">
                <button id="confirmarFinalizar" class="btnModal" onclick="cerrarModalFinalizar()">Aceptar</button>
                <button id="cancelarFinalizar" class="btnCancel" onclick="cerrarModalFinalizar()">Cancelar</button>
            </div>
        </div>
    </div>

    <script>
        var currentActividadId;
        var currentButton;

        function mostrarModal(button, actividadId) {
            currentActividadId = actividadId;
            currentButton = button;
            document.getElementById('modal').style.display = 'flex';
        }

        function cerrarModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function empezarActividad() {
            // Aquí puedes agregar la lógica para empezar la actividad
            console.log('Empezar actividad:', currentActividadId);
            // Cambiar texto del botón a 'Finalizar'
            currentButton.innerText = 'Finalizar';
            // Cambiar color de fondo de los botones con clase 'btnSubmit' a gris claro
            var buttons = document.querySelectorAll('.btnSubmit');
            buttons.forEach(btn => {
                if (btn !== currentButton) {
                    btn.classList.remove("btnSubmit");
                    btn.classList.add("btnGris");
                }
            });
            // Cambiar clase del botón a 'btnFinalizar'
            currentButton.classList.remove('btnSubmit');
            currentButton.classList.add('btnFinalizar');
            // Agregar evento onclick para el botón de 'Finalizar'
            currentButton.onclick = mostrarModalFinalizar;
            // Agregar clase o atributo para identificar que la actividad está en curso
            currentButton.dataset.actividadEstado = 'enCurso';
            // Deshabilitar los otros botones de la fila
            buttons.forEach(btn => {
                if (btn !== currentButton) {
                    btn.disabled = true;
                }
            });
            cerrarModal();
        }

        function mostrarModalFinalizar() {
            document.getElementById('modalFinalizar').style.display = 'flex';
        }

        function cerrarModalFinalizar() {
            document.getElementById('modalFinalizar').style.display = 'none';
            // Restaurar botones a su estado original
            var buttons = document.querySelectorAll('.btnGris');
            buttons.forEach(btn => {
                btn.classList.remove('btnGris');
                btn.classList.add('btnSubmit');
                btn.disabled = false;
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('tablaContenedor').style.display = 'block';
    var rows = document.querySelectorAll('tr.animate__animated');
    rows.forEach((row, index) => {
        setTimeout(() => {
            row.classList.add('animate__slideInLeft');
            if (index === 0) {
                document.querySelector('.tr-oculto').classList.remove('tr-oculto');
            }
        }, index * 20);
    });
});


    </script>
</body>

</html>
