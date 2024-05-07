<?php 
session_start();
require 'libreria/iUsuarios.php';
require 'libreria/usuariosEmpleados.php';



$p['resultado'] = '';
$c = new UsuarioEmpleado();

// Verificar si se recibió el ID del usuario
if (isset($_POST['idUsuarios']) && !isset($_POST['usuario'])) {
    $dc = $c->GetDatos($_POST['idUsuarios']); // Asumiendo que devuelve un array con los datos.
    $p['resultado'] = $dc; // Pasar los datos a la vista
} elseif (isset($_POST['nombre'], $_POST['usuario'], $_POST['correo'], $_POST['contrasena'])) {
    $resultado = $c->Editar($_POST['idUsuarios'], $_POST['nombre'], $_POST['usuario'], $_POST['correo'], $_POST['contrasena']);  
   
}

View('actualizarEmpleados', $p);
?>
