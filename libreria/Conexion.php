<?php
    class Conexion{
        private static $objeto;
        private function __contruct(){}
        
        public static function getObjeto()
        {
            if(!self::$objeto)//si la instancia no existe la crea y la retorna y si existe la retorna
                self::$objeto = new self();
            return self::$objeto;

        }
       function insertarUsuario($nombre,$nombreUsuario,$correo,$contraseña)
       {
        $con = new mysqli(s,u,p,bd);
        $q = $con->set_charset("utf8");
        $q = $con->stmt_init();
        $q ->prepare('CALL insertarUsuario(?,?,?,?,null)');
        $q->bind_param('ssss',$nombre,$nombreUsuario,$correo,$contraseña);
        $q->execute();
        $q->close();
       }
       function Mostrar($fil)
       {
           $con = new mysqli(s,u,p,bd);
           $con->set_charset('utf8');
           $q = $con->stmt_init();
           $q->prepare('CALL showUsuario(%)');
           $fil = '%' . $fil . '%';
           $q->bind_param('s', $fil);
           $q->execute();
           $q->bind_result($nombre,$nombreUsuario,$correo,$contraseña);
           $rs = '<table class="table table-bordered table-striped">
           <thead><><th>nombre</th><th>nombreUsuario</th><th>correo</th><th>contraseña</th></thead><tbody>';
               while ($q->fetch()) {
                   $rs .= "<tr>
                   <td>$nombre</td>
                   <td>$nombreUsuario</td>
                  <td>$correo</td>
                  <td>$contraseña</td>
                   </tr>";
               }
           $q->close();
           return $rs . "</tbody></table>";
       }
   }
  
    

?>