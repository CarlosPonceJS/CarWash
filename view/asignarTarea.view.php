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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="./css/styleJaz.css">
    <title>CRUD</title>
    <style>
        
    </style>
</head>
<body>
    <br><br><br>
    <div class="div">
        <?php echo $resultado;?>
        
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>¡ADVERTENCIA!</h2>
            </div>
            <div class="modal-body">
                <p id="modal-message">Una vez asignada la tarea no se podrá hacer ninguna modificación. ¿Desea continuar?</p>
            </div>
            <div class="modal-footer">
                <button id="asignarTarea" class="btnModal" onclick="cerrarModal()">Continuar</button>
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
    </script>
    <script>
    function updateResponsable() {
        var selectElement = document.querySelector('.nuevoSelect');
        var selectedUserId = selectElement.value;
        document.getElementById('userIdField').value = selectedUserId;
        console.log('Usuario Seleccionado (ID): ' + selectedUserId);
    }

    // Agrega un listener al evento 'change' del <select> para capturar cambios
    var selectElement = document.querySelector('.nuevoSelect');
    selectElement.addEventListener('change', updateResponsable);
</script>
</body>
</html>