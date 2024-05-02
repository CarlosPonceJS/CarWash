<!DOCTYPE html>
<html lang="en">
<body>
    <?php
    
    $permisos = 2 ;
    ?>
    <header class="header">
        <div class="logo-header">
            <img src="./images/LogoAuto.png" alt="Logotipo auto">
            <span>CarWash</span>
        </div>
        <nav class="navegacion-principal">
            <ul>
            <?php if ($permisos == 1) { ?>
                <a href="tareasEmpleado">Tareas</a>
                <a href="registrarCompra">Registrar Compra</a>
            <?php } elseif ($permisos == 2) { ?>
                <a href="crudEmpleado">Empleados</a>
                <a href="asignarTarea">Asignar Tarea</a>
                <a href="historialTareas">Historial de Tareas</a>
            <?php } ?>
                <a href="#">Cerrar Sesión</a>
            </ul>
        </nav>
    </header>
</body>
</html>


