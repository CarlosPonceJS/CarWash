<?php
session_start();
require 'conf.php';
require 'libreria/agregarCliente.php';

//Vehiculos
require 'libreria/IVehiculos.php';
require 'libreria/mostradorVehiculos.php';
require 'libreria/Carro.php';
require 'libreria/Camion.php';
require 'libreria/Camioneta.php';
//Libreria agregarCliente
$empleado = new empleado();

//INSERTAR VEHICULOS

if(isset($_POST['nombre'])) {
    $tipo = $_POST['tipo_auto'];
    //IMAGEN
    $imagen = '';
    $file = $_FILES['foto'];
    $nombreImagen = $file['name'];
    $rutaDefecto = $file['tmp_name'];
    $carpeta = "img/";
    

    //Varable para usar la función mostrar dependiendo del vehiculo que se llame
    $vehiculo = mostradorVehiculos::Mostrar($tipo);

    //IMG
    $src = $carpeta.$nombreImagen;
    move_uploaded_file($rutaDefecto,$src);
    $imagen = "img/".$nombreImagen;


    //GUARDAR EN LA DB DEPENDIENDO DEL VEHICULO
    if($tipo == "camioneta") {
        $vehiculo->puertas = $_POST['puertas'];

        $empleado->agregarCliente($_POST['nombre'], $_POST['placas'], $_POST['telefono'], $tipo, $vehiculo->puertas, $imagen, $empleado->generadorTurnos(), $vehiculo->operacionCosto());

    } elseif($tipo == "camion") {
        $vehiculo->longitud = $_POST['longitud'];

        $empleado->agregarCliente($_POST['nombre'], $_POST['placas'], $_POST['telefono'], $tipo,$vehiculo->longitud, $imagen, $empleado->generadorTurnos(), $vehiculo->operacionCosto());

    } elseif($tipo == "auto") {
        $empleado->agregarCliente($_POST['nombre'], $_POST['placas'], $_POST['telefono'], $tipo,$vehiculo->piezas, $imagen, $empleado->generadorTurnos(), $vehiculo->operacionCosto());
    }
}

$p = array();
View('registrarCompra', $p);
?>