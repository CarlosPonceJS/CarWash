<?php 
	session_start();
	require 'libreria/Conexion.php';
	require 'config.php';
	$p = array();

	$p['resultado'] = '';
	$c = new conexion();
	//tomar peticiones post
	
	
	$p['resultado'] = $c->Mostrar('%');
		
	
	//c->Uno;//se llama porque no es estatico y solo se llama con funcion flecha
	//Conexion::Dos();//se llama porque es estatica e igualmente se puede invocar con funcion flecha
	View('mostrar',$p);
 ?>