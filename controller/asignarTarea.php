
<?php
session_start();
require_once 'helpers.php';
require 'libreria/asignarTareaAdmin.php';

$p['resultado'] = '';
$c = new asignarTareaAd();
if (isset($_POST['_id']) && isset($_POST['_idUsuario'])) {
    $idVehiculo = $_POST['_id'];
    $idUsuario = $_POST['_idUsuario'];
    $c->insertarTareaAsignada($idVehiculo, $idUsuario,1);
    $p['resultado']=$c->mostrarTareasSinAsignar('%');
    }

$p['resultado']=$c->mostrarTareasSinAsignar('%');
$view = 'asignarTarea'; 

View($view, $p);
?>