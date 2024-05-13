<!DOCTYPE html>
<html lang="en">
<body>
    <?php
    if(isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];

    }
    if($usuario)
    $permisos = $usuario ;
    else
        $permisos = "";
    ?>
    <header class="header">
        <div class="logo-header">
            <img src="./images/LogoAuto.png" alt="Logotipo auto">
            <span>CarWash</span>
        </div>
        <nav class="navegacion-principal">
            <ul>
            <?php if ($permisos !="admin") { ?>
                <a href="tareasEmpleado">Tareas</a>
                <a href="registrarCompra">Registrar Compra</a>
            <?php } else if ($permisos == "admin") { ?>
                <a href="crudEmpleado">Empleados</a>
                <a href="asignarTarea">Asignar Tarea</a>
                <a href="historialTareas">Historial de Tareas</a>
            <?php } ?>
                <a href="home" onclick="recargar()" >Cerrar Sesión</a>
            </ul>
        </nav>
    </header>
    <script>function recargar(){
        location.reload();
    }</script>
</body>
</html>


