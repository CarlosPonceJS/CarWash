
<?php
session_start();
require_once 'helpers.php';
require 'libreria/iUsuarios.php';
require 'libreria/usuariosEmpleados.php';

	$p = array();
	$p['resultado'] = '';
	$c = new UsuarioEmpleado();
	//tomar peticiones post
	if (isset($_POST['nombre']))
	{
	$c->insertarUsuario($_POST['nombre'],$_POST['usuario'],$_POST['correo'],$_POST['contrasena']);	
	$p['resultado']=$c->mostrarUsuariosEmpleados('%');
	}
$view = 'crearEmpleado';

$p = array('view' => $view);
View($view, $p);
?>