
<?php
session_start();
require_once 'helpers.php';
require 'libreria/asignarTareaAdmin.php';

$p['resultado'] = '';
$c = new asignarTareaAd();
$p['resultado']=$c->mostrarTareasSinAsignar('%');
$view = 'asignarTarea'; 

View($view, $p);
?>