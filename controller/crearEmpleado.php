
<?php
session_start();
require_once 'helpers.php';
$view = 'crearEmpleado';

$p = array('view' => $view);
View($view, $p);
?>