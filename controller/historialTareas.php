
<?php
session_start();
require_once 'helpers.php';
require 'libreria/historialTareas.php';
$p = array();
$p['resultado'] = '';
$c = new historialDeTareas();

$p['resultado']=$c->mostrarHistorialTareas('%');
$view = 'historialTareas'; 

View($view, $p);
?>