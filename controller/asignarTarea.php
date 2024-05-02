

<?php
session_start();
require_once 'helpers.php';

$view = 'asignarTarea'; 

$p = array('view' => $view);
View($view, $p);
?>