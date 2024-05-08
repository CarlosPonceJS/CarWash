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
                $q->bind_result($nombre,$placa,$modelo,$costo,$responsable);
                $rs = '<table id="tablaHistorial" class="table table-bordered table-striped">
                <thead><th>Nombre</th><th>Placa</th><th>Modelo</th><th>Costo</th><th>Responsable</th></thead><tbody>';
                    while ($q->fetch()) {
                        $rs .= "<tr>
                        <td>$nombre</td>
                        <td>$placa</td>
                        <td>$modelo</td>
                        <td>$costo</td>
                        <td>$responsable</td>
                        </tr>";
                    }
                $q->close();
                $rs . "</tbody></table>";
               
             return $rs;
            }
          
        }
?>