<?php
    class historialDeTareas
        {
        
          public function mostrarHistorialTareas($fil)
            {
                $con = new mysqli('localhost', 'root', '', 'carwash'); 
                $con->set_charset('utf8');
                $q = $con->stmt_init();
                $q->prepare('SELECT * FROM historialTareas  WHERE Nombre LIKE ?');
                $fil = '%' . $fil . '%';
                $q->bind_param('s', $fil);
                $q->execute();
                $q->bind_result($nombre,$placa,$modelo,$costo,$responsable,$fecha);
                $rs = '<table id="tablaHistorial" class="table table-bordered table-striped animate__animated animate__slideInRight">
                <thead><th>Nombre</th><th>Placa</th><th>Modelo</th><th>Costo</th><th>Responsable</th><th>Fecha</th></thead><tbody>';
                    while ($q->fetch()) {
                        $rs .= "<tr>
                        <td>$nombre</td>
                        <td>$placa</td>
                        <td>$modelo</td>
                        <td>$costo</td>
                        <td>$responsable</td>
                        <td>$fecha</td>
                        </tr>";
                    }
                $q->close();
                $rs . "</tbody></table>";
               
             return $rs;
            }
         public function obtenerEmpleadoDelDia($fil)
            {
            $con = new mysqli('localhost', 'root', '', 'carwash'); 
            $con->set_charset('utf8');
            $q = $con->stmt_init();
            $q->prepare('SELECT * FROM empleadoDelDia WHERE Nombre LIKE ?');
            $fil = '%' . $fil . '%';
            $q->bind_param('s', $fil);
            $q->execute();
            $q->bind_result($nombre,$usuario,$carros,$correo);
            $datosEmpleado = [];
            while ($q->fetch()) {
                $datosEmpleado = ['nombre' => $nombre, 'usuario' => $usuario, 'carros' => $carros, 'correo' => $correo];
            }
            $q->close();
           
           
         return $datosEmpleado;
            }
          
        }
        
?>