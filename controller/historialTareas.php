
<?php
session_start();
require_once 'helpers.php';
require 'libreria/historialTareas.php';
$c = new historialDeTareas();
$resultadoTareas = $c->mostrarHistorialTareas('%');
$resultadoEmpleado = $c->obtenerEmpleadoDelDia('%');

// Preparar los datos para la vista
$viewData = [
    'resultadoTareas' => $resultadoTareas,
    'resultadoEmpleado' => $resultadoEmpleado
];

View('historialTareas', $viewData);

?>