
<?php
session_start();
require_once 'helpers.php';

$view = 'crudEmpleado'; 

$p = array('view' => $view);
View($view, $p);
?>