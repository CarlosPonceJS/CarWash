<?php
function cargarHeader($permisos){
    ob_start(); // Inicia el almacenamiento en búfer de salida
    ?>

    <!-- Contenido del header -->
    <header>
        <div>
            <i class="fa fa-tasks"></i>
            <span>Logo</span>
        </div>
        <nav>
            <ul>
                <?php if ($permisos == 1) { ?>
                    <li><a href="#">Tareas</a></li>
                    <li><a href="#">Registrar Compra</a></li>
                <?php } elseif ($permisos == 2) { ?>
                    <li><a href="#">Empleados</a></li>
                    <li><a href="#">Asignar Tarea</a></li>
                    <li><a href="#">Historial de Tareas</a></li>
                <?php } ?>
                <li><a href="#">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <?php
    // Devuelve el contenido del búfer de salida y lo limpia
    return ob_get_clean();
}
