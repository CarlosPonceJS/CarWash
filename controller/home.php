<?php
session_start();
require_once 'helpers.php';
require 'conf.php';
require 'libreria/logIn.php';

$log = new logIn();

if(isset($_POST['usuario'])){
    if($log->logIn($_POST['usuario'],$_POST['contraseña'])){
        $usuario = $_POST['usuario'];
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("Location: paginaInicio");
        exit();
        //return $usuario;
        
    } else {
        // Si retorna false
        View('home');
        exit(); 
    }
}
View('home');
// Suponiendo que obtenemos los permisos de la bd. esto lo hace el back jijij
$tipoUsuario = obtenerTipoUsuario();
//'tipoUsuario' => $tipoUsuario

?>
