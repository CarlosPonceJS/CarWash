<?php 
    class mostradorVehiculos{
        static function Mostrar($vehiculo){
            switch($vehiculo){
                case 'auto': return new Carro(); break;

                case 'camioneta': return new Camioneta(); break;

                case 'camion': return new Camion(); break;
            }
        }
    }
?>