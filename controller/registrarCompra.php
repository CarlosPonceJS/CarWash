
<?php
session_start();
require_once 'helpers.php';

$view = 'registrarCompra'; 

$p = array('view' => $view);
View($view, $p);
?>