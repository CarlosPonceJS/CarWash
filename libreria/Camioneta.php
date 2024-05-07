<?php 
    class Camioneta implements IVehiculos{
        public $puertas;
        function operacionCosto() {
            return (50*$this->puertas);
        }
    }
?>