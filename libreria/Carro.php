<?php 
    class Carro implements IVehiculos{
        public $piezas = 1;
        function operacionCosto(){
            return (80*$this->piezas);
        }
    }
?>