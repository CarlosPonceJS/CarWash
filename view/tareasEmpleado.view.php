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
        <table class="contenedor" class="animate_animated">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Placas</th>
                    <th>Dueño</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
            <?php echo $resultado?>
            </tbody>
        </table>
    </div>

    <div id="modal" class="modal" >
        <!--Input invisible para guardar id -->
        <input type="hidden" name="actividad_id" id="actividad_id">
        
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
                <button id="confirmarFinalizar"  class="btnModal" onclick="cerrarModalFinalizar()">Aceptar</button>
                <button id="cancelarFinalizar" class="btnCancel" onclick="cerrarModalFinalizar()">Cancelar</button>
            </div>
        </div>
    </div>

    <script>
        var currentActividadId;
        var currentButton;

        function enviarId(id,boton) {
            // Obtener id invisible que almacena el id
            document.getElementById("actividad_id").value = id;
            // Get the states of the buttons

            // Crear una solicitud AJAX para casar con el php back end
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Mostrar si hay un error
                        console.log("Request successful:", xhr.responseText);
                    } else {
                        console.error("Error:", xhr.status);
                    }
                }
            }; 
            //Ruta de la vista que contiene el código back end
            xhr.open("POST", "tareasEmpleado", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            //Si un boton específico es presionado, manda el id y el boton que necesito
            document.getElementById(boton).addEventListener("click", function(){

                xhr.send(`actividad_id= ${id} &${boton}=`);
                //Recargar página cuando el boton sea el de finalizar tarea
                if(boton == "confirmarFinalizar")
                location.reload();
            });
        }

        function mostrarModal(button, actividadId) {
            currentActividadId = actividadId;
            currentButton = button;
            document.getElementById('modal').style.display = 'flex';
            enviarId(currentActividadId, "confirmarTarea");
        }

        function cerrarModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function empezarActividad() {
            // Aquí puedes agregar la lógica para empezar la actividad
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
            enviarId(currentActividadId,"confirmarFinalizar");
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
                //document.querySelector('.tr-oculto').classList.remove('tr-oculto');
            }
        }, index * 20);
    });
});


    </script>
</body>

</html>
