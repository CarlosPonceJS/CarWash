<?php
    class empleado {
        //SINGLETON
        public static function obtenerModulo(){
            if(!self::$modulo)
                self::$modulo = new self();
            return self::$modulo;
        }

        //Turnos
        function generadorTurnos() {
            $conexion = new mysqli(s,uEmpleado,pEmpleado,bd);
            $conexion->set_charset('utf8');
            $consulta = $conexion->stmt_init();
            $consulta->prepare('SELECT MAX(vehiculos.turno) FROM vehiculos');
            $consulta->execute();
            $consulta->bind_result($turnoMaximo);
            $consulta->fetch();
            $consulta->close();
            
            // Si no hay turnos, el turno = 0
            if(!$turnoMaximo) {
                $turnoMaximo = 0;
            }
            // Turno +1
            return $turnoMaximo + 1;
        }

        //Insertar cliente.
        function agregarCliente($nombreCliente, $placa,$telefono,$tipoVehiculo,$caracteristica,$foto,$turno,$costo){

            $conexion = new mysqli(s,uEmpleado,pEmpleado,bd);
            $conexion->set_charset('utf8');
            $consulta = $conexion->stmt_init();
            $consulta->prepare('call insertarVehiculo(?,?,?,?,?,?,?,?,null)');

            $consulta->bind_param('ssssdsid',$nombreCliente,$placa,$telefono,$tipoVehiculo,$caracteristica,$foto,$turno,$costo);

            $consulta->execute();
            $consulta->close();
        }
    }
?>