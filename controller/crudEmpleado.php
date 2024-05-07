
<?php
session_start();
require_once 'helpers.php';
require 'libreria/iUsuarios.php';
require 'libreria/usuariosEmpleados.php';
	
	$p = array();

	$p['resultado'] = '';
	$c = new UsuarioEmpleado();
	//tomar peticiones post
	
	if(isset($_POST['_id'])){
		$c->Borrar($_POST['_id']);
		$p['resultado']=$c->mostrarUsuariosEmpleados('%');
	}
	$p['resultado']=$c->mostrarUsuariosEmpleados('%');
	
$view = 'crudEmpleado'; 

// $p = array('view' => $view);
View($view, $p);
?>