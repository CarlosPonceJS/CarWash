<?php
session_start();
require_once 'helpers.php';
// Suponiendo que obtenemos los permisos de la bd. esto lo hace el back jijij
$tipoUsuario = obtenerTipoUsuario();

$p = array('tipoUsuario' => $tipoUsuario);
View('historialTareas', $p);
?>
