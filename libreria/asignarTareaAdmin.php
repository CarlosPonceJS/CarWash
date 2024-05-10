<?php
    class asignarTareaAd
        {
        
            public function mostrarTareasSinAsignar($fil)
            {
                $con = new mysqli('localhost', 'root', '', 'carwash'); 
                $con->set_charset('utf8');
                
                // Primero, obtener los usuarios disponibles
                $usuarios = array();
                $queryUsuarios = "SELECT nombreUsuario FROM usuarios"; // Asegúrate de que el nombre de la columna y tabla sean correctos
                if ($resultadoUsuarios = $con->query($queryUsuarios)) {
                    while ($row = $resultadoUsuarios->fetch_assoc()) {
                        $usuarios[] = $row['nombreUsuario'];
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
                        <select class='nuevoSelect' name='responsable'>";
                    foreach ($usuarios as $usuario) {
                        $selected = ($usuario == $responsable) ? "selected" : "";
                        $rs .= "<option value='$usuario' $selected>$usuario</option>";
                    }
                    $rs .= "</select>
                    </td>
                    <td>
                        <form method='post' action='' class='formAsignacion'>
                            <button class='btni' style='background-color: #7DF89F;'>Asignar</button>
                            <input type='hidden' name='_id' value='" . $id . "'>
                            
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