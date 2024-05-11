CREATE DATABASE carwash;
CREATE TABLE usuarios(idUsuarios INT PRIMARY KEY AUTO_INCREMENT, 
nombre VARCHAR(150), nombreUsuario VARCHAR(15),
correo VARCHAR(50), contraseña VARCHAR(20));


CREATE TABLE vehiculos(idVehiculos INT PRIMARY KEY AUTO_INCREMENT, 
nombreCliente VARCHAR(150), placa VARCHAR(10), telefono VARCHAR(15), 
modelo VARCHAR(30), caracteristica DOUBLE, foto LONGBLOB, turno INT, costo DOUBLE); 

CREATE TABLE tareas(idTareas INT PRIMARY KEY AUTO_INCREMENT, fkIdVehiculos INT, fkidUsuarios INT, estado ENUM('Asignada','En proceso','Completada'), 
FOREIGN KEY(fkIdVehiculos) REFERENCES vehiculos(idVehiculos), 
FOREIGN KEY(fkidUsuarios) REFERENCES usuarios(idUsuarios));

/*----------------------------- USUARIOS SQL ------------------------------------------------*/
CREATE USER 'empleado'@'localhost' IDENTIFIED BY '';
GRANT SELECT, INSERT ON carwash.* TO 'empleado'@'localhost';
GRANT EXECUTE ON PROCEDURE showVehiculo TO 'empleado'@'localhost';
GRANT EXECUTE ON PROCEDURE insertarVehiculo TO 'empleado'@'localhost';
GRANT EXECUTE ON PROCEDURE verTareasEmpleado TO 'empleado'@'localhost';
GRANT EXECUTE ON PROCEDURE cambiarEstadoTarea TO 'empleado'@'localhost';
FLUSH PRIVILEGES;
/*----------------------------- FIN USUARIOS SQL ------------------------------------------------*/

/*------------------------------------ VISTAS -----------------------------------------------*/
-- VIsta para visualizar el historial de tareas y ventas.
CREATE VIEW historialTareas AS
SELECT v.nombreCliente AS 'Nombre', v.placa AS 'Placa', v.modelo AS 'Modelo', 
v.costo AS 'Costo', u.nombre AS 'Responsable' FROM usuarios u, vehiculos v
JOIN tareas WHERE u.idUsuarios = tareas.fkidUsuarios AND v.idVehiculos = tareas.fkIdVehiculos AND tareas.estado = 3;

-- Vista para agregar un empleado
CREATE VIEW agregarEmpleado AS
SELECT u.nombre AS 'Nombre', u.nombreUsuario AS 'Nombre de usuario', u.correo AS 'Correo', u.contraseña AS 'Contraseña' 
FROM usuarios u;

-- Vista para ver las tareas que no han sido asignadas y asignarlas al usuario.
CREATE VIEW tareasPorAsignar AS
SELECT v.idVehiculos, v.nombreCliente AS Nombre, v.placa AS Placa, v.modelo AS Modelo FROM vehiculos v
LEFT JOIN tareas t ON v.idVehiculos = t.fkIdVehiculos LEFT JOIN usuarios u ON t.fkidUsuarios = u.idUsuarios WHERE t.estado IS NULL;


/*---------------------------Vistas TERMINADAS----------------------------------*/

/*---------------------------Procedure Crud Usuarios----------------------------------*/
/*Insertar un usuario*/
delimiter ;;
CREATE PROCEDURE insertarUsuario(
IN _nombre VARCHAR(150), 
IN _nombreUsuario VARCHAR(15),
IN _correo VARCHAR(50), 
IN _contraseña VARCHAR(20),
IN _idUsuarios INT)
BEGIN 
DECLARE contadorUsuarios INT;
SELECT COUNT(*) FROM usuarios WHERE nombreUsuario = _nombreUsuario INTO contadorUsuarios;
if contadorUsuarios = 0 then
INSERT INTO usuarios VALUES(NULL,_nombre,_nombreUsuario,_correo,_contraseña);
END if;
END;;

/*Actualizar un usuario*/
delimiter ;;
CREATE PROCEDURE actualizarUsuario(
IN _nombre VARCHAR(150), 
IN _nombreUsuario VARCHAR(15),
IN _correo VARCHAR(50), 
IN _contraseña VARCHAR(20),
IN _idUsuarios INT )
BEGIN 
UPDATE usuarios SET nombre = _nombre,nombreUsuario=_nombreUsuario,correo=_correo,contraseña=_contraseña WHERE idUsuarios = _idUsuarios;
END;;

/*Borrar un usuario*/
delimiter ;;
CREATE PROCEDURE borrarUsuario(
IN _idUsuarios INT )
BEGIN 
DELETE FROM usuarios WHERE idUsuarios = _idUsuarios;
END;;


/*Busqueda por nombre*/
delimiter ;; 
CREATE PROCEDURE showUsuario(
IN _filtro VARCHAR(100))
BEGIN 
SELECT u.nombre,u.nombreUsuario,u.correo,u.contraseña  FROM usuarios u  WHERE u.nombre LIKE _filtro;
END;;


/*---------------------------Procedure Crud Vehiculos----------------------------------*/
/*Insertar un vehiculo de un cliente*/
delimiter ;;
CREATE PROCEDURE insertarVehiculo( 
IN _nombreCliente VARCHAR(150), 
IN _placa VARCHAR(10), 
IN _telefono VARCHAR(15), 
IN _modelo VARCHAR(30), 
IN _caracteristica DOUBLE, 
IN _foto LONGBLOB, 
IN _turno INT, 
IN _costo DOUBLE,
IN _idVehiculos INT)
BEGIN 
INSERT INTO vehiculos VALUES(NULL,_nombreCliente,_placa,_telefono,_modelo,_caracteristica,_foto,
_turno,_costo);
END;;

/*Actualizar un vehiculo de un cliente*/
delimiter ;;
CREATE PROCEDURE actualizarVehiculo(
IN _nombreCliente VARCHAR(150), 
IN _placa VARCHAR(10), 
IN _telefono VARCHAR(15), 
IN _modelo VARCHAR(30), 
IN _caracteristica DOUBLE, 
IN _foto LONGBLOB, 
IN _turno INT, 
IN _costo DOUBLE,
IN _idVehiculos INT)
BEGIN 
UPDATE vehiculos SET nombreCliente=_nombreCliente,placa=_placa,telefono=_telefono,modelo=_modelo,caracteristica=_caracteristica,foto=_foto,
turno=_turno,costo=_costo WHERE idVehiculos = _idVehiculos;
END;;

/*Borrar un vehiculo de un cliente*/
delimiter ;;
CREATE PROCEDURE borrarVehiculo(
IN _idVehiculos INT )
BEGIN 
DELETE FROM vehiculos WHERE idVehiculos = _idVehiculos;
END;;

/*Busqueda por nombre*/
delimiter ;; 
CREATE PROCEDURE showVehiculo(
IN _filtro VARCHAR(100))
BEGIN 
SELECT v.nombreCliente,v.telefono,v.foto,v.turno,v.costo  FROM vehiculos v  WHERE v.nombreCliente  LIKE _filtro;
END;;

/*---------------------------Procedure Tareas----------------------------------*/
/*Insertar una tarea a un empleado*/
delimiter ;;
CREATE PROCEDURE insertarTarea(  
IN _fkIdVehiculos INT, 
IN _fkidUsuarios INT,
IN _estado ENUM('Asignada','En proceso','Completada'),
IN _idTareas INT)
BEGIN 
INSERT INTO tareas VALUES(NULL,_fkIdVehiculos,_fkidUsuarios, _estado);
END;;

/*Actualizar una tarea*/
delimiter ;;
CREATE PROCEDURE actualizarTarea(IN _estado ENUM('Asignada','En proceso','Completada'), _idTareas int)
BEGIN 
UPDATE tareas SET estado = _estado WHERE idTareas=_idTareas;
END;;

/*Eliminar una tarea*/
delimiter ;;
CREATE PROCEDURE borrarTarea(
IN _idTareas INT )
BEGIN 
DELETE FROM Tareas WHERE idTareas = _idTareas;
END;;

/*Busqueda por nombre*/
delimiter ;; 
CREATE PROCEDURE showTarea(
IN _filtro VARCHAR(100))
BEGIN 
SELECT u.nombreUsuario,v.nombreCliente,v.costo  FROM tareas t,usuarios u,vehiculos v  WHERE t.fkIdVehiculos=v.idVehiculos AND t.fkidUsuarios=u.idUsuarios AND u.nombreUsuario  LIKE _filtro;
END;;


/*Ver las tareas que debe realizar el empleado*/
delimiter ;;
CREATE PROCEDURE verTareasEmpleado(IN _nombre VARCHAR(100))
BEGIN
	SELECT vehiculos.idVehiculos, vehiculos.foto AS 'Imagen', vehiculos.placa AS 'Placas', vehiculos.nombreCliente AS 'Dueño' FROM vehiculos JOIN tareas, usuarios 
	WHERE tareas.fkidUsuarios=usuarios.idUsuarios AND tareas.fkIdVehiculos = vehiculos.idVehiculos AND usuarios.nombre=_nombre AND tareas.estado!='Completada';
END;;

/*Marcar una tarea como finalizada o en proceso*/
DROP PROCEDURE cambiarEstadoTarea
delimiter ;;
CREATE PROCEDURE cambiarEstadoTarea(IN _estado ENUM('Asignada','En proceso','Completada'), IN _id int)
BEGIN
	UPDATE tareas t SET t.estado = _estado WHERE t.fkIdVehiculos = _id;
END;;
/*---------------------------Procedures TERMINADOS----------------------------------*/