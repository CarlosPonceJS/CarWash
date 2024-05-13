<?php
session_start();
require_once 'helpers.php';
require 'conf.php';
require 'libreria/tareasEmpleado.php';

$view = 'tareasEmpleado'; 
$empleado = new empleado();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST["confirmarTarea"])){
        $id = $_POST["actividad_id"]; // Assuming the same ID is used for both actions
        $empleado->cambiarEstadoTarea(2, $id);
    }
    
    if(isset($_POST["confirmarFinalizar"])){
        $id = $_POST["actividad_id"]; // Assuming the same ID is used for both actions
        $empleado->cambiarEstadoTarea(3, $id);
    }
}
//Variable para obtener la variable de sesion usuario.
$usuario = "";
//Si la variable de sesion existe
if(isset($_SESSION['usuario'])){
    //usuario = esa variable de sesion
    $usuario = $_SESSION['usuario'];
}

// Always show the table
$p['resultado'] = $empleado->Mostrar($usuario);

View($view, $p);
?>