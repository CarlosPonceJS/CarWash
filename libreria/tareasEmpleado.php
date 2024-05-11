<?php 
    class empleado {
            //SINGLETON
            public static function obtenerModulo(){
                if(!self::$modulo)
                    self::$modulo = new self();
                return self::$modulo;
            }
        
            //MOSTRAR
            function Mostrar($empleado){
                $con = new mysqli(s, uEmpleado, pEmpleado, bd);
                $con->set_charset('utf8');
                

                $q = $con->stmt_init();
                $q->prepare("CALL verTareasEmpleado(?);");
                $q->bind_param('s', $empleado); 
                $q->execute();
                $q->bind_result($id,$foto, $placa, $dueño);
                
                $rs = '';
            
                while ($q->fetch()) {
                    $rs .= '
                    <tr class="animate__animated">
                        <td class="px-6 py-4" >
                            <img src="'.$foto.'" alt="Car" class="auto_imagen" style="max-width: 20rem; height: auto;">
                        </td>
            
                        <td class="px-6 py-4">
                            '.$placa.'
                        </td>
            
                        <td class="px-6 py-4">
                            '.$dueño.'
                        </td>
        
                        <td><button class="btn btnSubmit" onclick="mostrarModal(this,'.$id.')">Realizar</button></td>
                        
                    </tr>';
                }
                    $q->close();
                $con->close();
            
                return $rs;
            }

            //Cambiar el estado de una tarea.
            function cambiarEstadoTarea($estado,$id){
                $con = new mysqli(s, uEmpleado, pEmpleado, bd);
                $con->set_charset('utf8');
                $q = $con->stmt_init();

                $q->prepare("CALL cambiarEstadoTarea(?,?);");
                $q->bind_param('ii', $estado,$id); 
                $q->execute();
                $q->close();
            }
    }
?>