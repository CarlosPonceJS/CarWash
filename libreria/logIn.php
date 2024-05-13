<?php 
    class logIn{
        //SINGLETON
        public static function obtenerModulo(){
            if(!self::$modulo)
                self::$modulo = new self();
            return self::$modulo;
        }

        function obtenerUsuario($usuario){
            if($usuario != "admin"){
                return 'empleado';
            }else{
                return 'root';
            }
        }
        
        function LogIn($usuario, $contraseña) {
            if($this->obtenerUsuario($usuario)){
                $conexion = new mysqli(s,$this->obtenerUsuario($usuario),pAdmin,bd);
                $consulta = $conexion->prepare('SELECT nombreUsuario, contraseña FROM usuarios WHERE nombreUsuario = ?');
                $consulta->bind_param('s', $usuario);
                $consulta->execute();
                
                $consulta->bind_result($user, $pass);
                $consulta->fetch();
    
                if ($user==$usuario && $pass==$contraseña) {
                    return true;
                } else {
                    echo 'Error, check your credentials and try again';
                    return false;
                }
                $consulta->close();
                $conexion->close();
            }

        }
        
    }
?>