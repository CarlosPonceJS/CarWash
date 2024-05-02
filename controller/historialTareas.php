
<?php
session_start();
require_once 'helpers.php';


$view = 'historialTareas'; 

$p = array('view' => $view);
View($view, $p);
?>