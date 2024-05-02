<?php
session_start();
require_once 'helpers.php';


$view = 'empleadosTareasAdministrador'; 

$p = array('view' => $view);
View($view, $p);
?>