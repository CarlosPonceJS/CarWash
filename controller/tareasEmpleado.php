<?php
session_start();
require_once 'helpers.php';

$view = 'tareasEmpleado'; 

$p = array('view' => $view);
View($view, $p);
?>