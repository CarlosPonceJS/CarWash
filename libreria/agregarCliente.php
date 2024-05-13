<?php
    require_once('tcpdf/tcpdf.php');
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

        function imprimirPDF($nombre, $tipo, $turnos, $costo) {
            $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Your Name');
            $pdf->SetTitle('Información del Cliente');
            $pdf->SetSubject('Información del Cliente');
            $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);

            $pdf->AddPage();

            // Agregar el contenido al PDF
            $content = "
                <h1>Ticket de compra</h1>
                <p><strong>Nombre:</strong> $nombre</p>
                <p><strong>Tipo de vehículo:</strong> $tipo</p>
                <p><strong>Turno:</strong> $turnos</p>
                <p><strong>Costo:</strong> $costo</p>
            ";

            $pdf->writeHTML($content, true, false, true, false, '');

            // Nombre del archivo
            $filename = 'ticket'.$nombre.''.$turnos.'.pdf';

            // Salida del PDF
            $pdf->Output($filename, 'D');
            echo $pdf;
        }

    }
?>