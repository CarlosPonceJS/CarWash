<?php 
	session_start();
	require 'libreria/Conexion.php';
	require 'config.php';
	$p = array();
	$p['resultado'] = '';
	$c = new conexion();
	//tomar peticiones post
	if (isset($_POST['nombre']))
	{
	$c->Insertar($_POST['nombre'],$_POST['usuario'],$_POST['correo'],$_POST['contraseña']);	
	}
	//c->Uno;//se llama porque no es estatico y solo se llama con funcion flecha
	//Conexion::Dos();//se llama porque es estatica e igualmente se puede invocar con funcion flecha
	View('registrar',$p);
 ?>