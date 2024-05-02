<?php
session_start();
require_once 'helpers.php';

// Aquí podrías tener lógica para determinar qué vista cargar
$view = 'actualizarEmpleados'; // Por ejemplo

$p = array('view' => $view);
View($view, $p);
?>