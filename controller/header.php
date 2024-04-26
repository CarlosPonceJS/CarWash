<?php
function cargarHeader($permisos){
    ob_start(); // Inicia el almacenamiento en búfer de salida
    ?>
    <!-- Contenido del header -->
    <header class="header">
        <div class="logo-header">
            <img src="./images/LogoAuto.png" alt="Logotipo auto">
            <span>CarWash</span>
        </div>
        <nav class="navegacion-principal" >
            <ul>
                <?php if ($permisos == 1) { ?>
                    <a href="#">Tareas</a>
                    <a href="#">Registrar Compra</a>
                <?php } elseif ($permisos == 2) { ?>
                    <a href="#">Empleados</a>
                    <a href="#">Asignar Tarea</a>
                    <a href="#">Historial de Tareas</a>
                <?php } ?>
                <a href="#">Cerrar Sesión</a>
            </ul>
        </nav>
    </header>

    <?php
    // Devuelve el contenido del búfer de salida y lo limpia
    return ob_get_clean();
}
