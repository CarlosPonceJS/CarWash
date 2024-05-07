<?php
    class UsuarioEmpleado 
        implements iCrearUsuarios
        {
            function insertarUsuario($nombre,$nombreUsuario,$correo,$contraseña)
            {
                $con = new mysqli('localhost', 'root', '', 'carwash'); 
                $q = $con->set_charset("utf8");
                $q = $con->stmt_init();
                $q ->prepare('CALL insertarUsuario(?,?,?,?,null)');
                $q->bind_param('ssss',$nombre,$nombreUsuario,$correo,$contraseña);
                $q->execute();
                $q->close();
                return 'Se guardo correctamente';
            }
            function mostrarUsuariosEmpleados($fil)
            {
                $con = new mysqli('localhost', 'root', '', 'carwash'); 
                $con->set_charset('utf8');
                $q = $con->stmt_init();
                $q->prepare('select * from usuarios where nombre like ?');
                $fil = '%' . $fil . '%';
                $q->bind_param('s', $fil);
                $q->execute();
                $q->bind_result($id,$nombre,$nombreUsuario,$correo,$contraseña);
                $rs = '<table class="table table-bordered table-striped">
                <thead><th>nombre</th><th>nombreUsuario</th><th>correo</th><th>contraseña</th></thead><tbody>';
                    while ($q->fetch()) {
                        $rs .= "<tr>
                        <td>$nombre</td>
                        <td>$nombreUsuario</td>
                        <td>$correo</td>
                        <td>$contraseña</td>
                        <td>
                            <form method='post' action=''>
                            <button> Eliminar </button>

                            <input type='hidden' name='_id' value='" . $id . "'>
                            </form>
					    </td>
					    <td>
                            <form method='post' action='editarUsuariosEmpleados'>
                            <button> editar </button>
                            
                            <input type='hidden' name='idUsuarios' value='" . $id . "'>
                            </form>					    
                        </td>
                        </tr>";
                    }
                $q->close();
                $rs . "</tbody></table>";
               
             return $rs;
            }
            function Borrar($id)
            {
                $con = new mysqli('localhost', 'root', '', 'carwash'); 
                $con->set_charset('utf8');
                $q = $con->stmt_init();
                $q->prepare("call borrarUsuario(?)");
                $q->bind_param('s',$id);
                $q->execute();
                $q->close();
            }
            
            public static function GetDatos($id)
            {
                $con = new mysqli('localhost', 'root', '', 'carwash');  
                $con->set_charset('utf8');
                $q = $con->stmt_init();
                $q->prepare("select * from usuarios where idUsuarios=?");
                $q->bind_param('s',$id);
                $q->execute();
                $q->bind_result($id,$nombre,$nombreUsuario,$correo,$contraseña);
                $q->fetch();
                $q->close();
                return array($id,$nombre,$nombreUsuario,$correo,$contraseña);
            }
            public function Editar($id,$nombre,$nombreUsuario,$correo,$contraseña)
            {
               $con = new mysqli('localhost', 'root', '', 'carwash');  
               $con->set_charset('utf8');
               $q = $con->prepare("UPDATE usuarios SET nombre=?, nombreUsuario=?, correo=?, contraseña=? WHERE idUsuarios=?");
               $q->bind_param('ssssi', $nombre,$nombreUsuario,$correo,$contraseña, $id);
               $result = $q->execute();
               $q->close();
               return $result;
           }
        }
?>