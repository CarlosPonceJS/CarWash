<?php 
    class Camion implements IVehiculos{
        public $longitud;
        function operacionCosto(){
            return (100*$this->longitud);
        }
    }
?>