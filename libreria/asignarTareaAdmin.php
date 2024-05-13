<?php
    class asignarTareaAd
        {
            
            function insertarTareaAsignada($fkidvehiculo,$fkidusuario,$estado)
            {
                $con = new mysqli('localhost', 'root', '', 'carwash'); 
                $q = $con->set_charset("utf8");
                $q = $con->stmt_init();
                $estado=1;
                $q ->prepare('CALL insertarTarea (?,?,?,null)');
                $q->bind_param('sss',$fkidvehiculo,$fkidusuario,$estado);
                $q->execute();
                $q->close();
                return 'Se guardo correctamente';
            }

            
            
            public function mostrarTareasSinAsignar($fil)
            {
                $con = new mysqli('localhost', 'root', '', 'carwash'); 
                $con->set_charset('utf8');
                
                // Primero, obtener los usuarios disponibles
                $usuarios = array();
                $queryUsuarios = "SELECT idUsuarios, nombreUsuario FROM usuarios where nombreUsuario !='admin'"; 
                if ($resultadoUsuarios = $con->query($queryUsuarios)) {
                    while ($row = $resultadoUsuarios->fetch_assoc()) {
                        $usuarios[] = $row;
                    }
                    $resultadoUsuarios->free();
                }

                
            
                // Preparar y ejecutar la consulta principal
                $q = $con->stmt_init();
                $q->prepare('SELECT * FROM tareasPorAsignar WHERE Nombre LIKE ?');
                $fil = '%' . $fil . '%';
                $q->bind_param('s', $fil);
                $q->execute();
                $q->bind_result($id, $nombre, $placa, $modelo, $responsable);
                
            
                $rs = '<table class="table table-bordered table-striped animate__animated animate__slideInRight">
                <thead><th>Nombre</th><th>Placa</th><th>Modelo</th><th>Responsable</th><th>acción</th></thead><tbody>';
                while ($q->fetch()) {
                    $rs .= "<tr>
                    <td>$nombre</td>
                    <td>$placa</td>
                    <td>$modelo</td>
                    <td>
                    <select class='nuevoSelect' name='responsable' onchange='updateResponsable($id, this.value)'>";
                    foreach ($usuarios as $usuario) {
                        $selected = ($usuario['idUsuarios'] == $responsable) ? "selected" : "";
                        $rs .= "<option value='{$usuario['idUsuarios']}' $selected>{$usuario['nombreUsuario']}</option>";
                    }
                    $rs .= "</select>
                    </td>
                    <td>
                   
                        <form method='post' action='asignarTarea'>
                            <button class='btni' style='background-color: #7DF89F;' >Asignar</button>
                          
                            <input type='hidden' name='_id' value='" . $id . "'>
                            <input type='hidden' name='_idUsuario' id='userIdField' value=''>
                            <script>console.log('" . $id . "');</script>
                            <script>console.log('" . $responsable . "');</script>
                            
                        </form>
                    </td>
                    </tr>";
                    
                }
                
                $q->close();
                $rs .= "</tbody></table>";
            
                return $rs;
            }
            
          
        }
        
?>