CREATE DATABASE carwash;

CREATE TABLE usuarios(idUsuarios INT PRIMARY KEY AUTO_INCREMENT, 
nombre VARCHAR(150), nombreUsuario VARCHAR(15),
correo VARCHAR(50), contraseña VARCHAR(20));

CREATE TABLE vehiculos(idVehiculos INT PRIMARY KEY AUTO_INCREMENT, 
nombreCliente VARCHAR(150), placa VARCHAR(10), telefono VARCHAR(15), 
modelo VARCHAR(30), caracteristica DOUBLE, foto LONGBLOB, turno INT, costo DOUBLE); 

CREATE TABLE tareas(idTareas INT PRIMARY KEY AUTO_INCREMENT, fkIdVehiculos INT, fkidUsuarios INT, 
FOREIGN KEY(fkIdVehiculos) REFERENCES vehiculos(idVehiculos), 
FOREIGN KEY(fkidUsuarios) REFERENCES usuarios(idUsuarios));

/*------------------------------------ VISTAS -----------------------------------------------*/
-- VIsta para visualizar el historial de tareas y ventas.
CREATE VIEW historialTareas AS
SELECT v.nombreCliente AS 'Nombre', v.placa AS 'Placa', v.modelo AS 'Modelo', 
v.costo AS 'Costo', u.nombre AS 'Responsable' FROM usuarios u, vehiculos v
JOIN tareas WHERE u.idUsuarios = tareas.fkidUsuarios AND v.idVehiculos = tareas.fkIdVehiculos;

-- Vista para agregar tareas a un empleado.
CREATE VIEW agregarTareas AS
SELECT v.nombreCliente AS 'Nombre', v.placa AS 'Placa', v.modelo AS 'Modelo', 
u.nombre AS 'Responsable' FROM usuarios u, vehiculos v
JOIN tareas WHERE u.idUsuarios = tareas.fkidUsuarios AND v.idVehiculos = tareas.fkIdVehiculos;

-- Vista para agregar un empleado
CREATE VIEW agregarEmpleado AS
SELECT u.nombre AS 'Nombre', u.nombreUsuario AS 'Nombre de usuario', u.correo AS 'Correo', u.contraseña AS 'Contraseña' 
FROM usuarios u;

-- Vista para visualizar las tareas restantes del empleado.
CREATE VIEW verTareas AS
SELECT v.foto AS 'Imagen', v.placa AS 'Placa', v.nombreCliente AS 'Dueño' FROM vehiculos v; 
/*---------------------------Vistas TERMINADAS----------------------------------*/


/*---------------------------Procedure Crud Usuarios----------------------------------*/
DROP PROCEDURE insertarUsuario;
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

delimiter ;;
CREATE PROCEDURE borrarUsuario(
IN _idUsuarios INT )
BEGIN 
DELETE FROM usuarios WHERE idUsuarios = _idUsuarios;
END;;


/*Busqueda por nombre*/
delimiter ;; 
CREATE PROCEDURE showUsuario(
_filtro VARCHAR(100))
BEGIN 
SELECT u.nombre,u.nombreUsuario,u.correo,u.contraseña  FROM usuarios u  WHERE u.nombre  LIKE _filtro;
END;;


/*---------------------------Procedure Crud Vehiculos----------------------------------*/
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

delimiter ;;
CREATE PROCEDURE borrarVehiculo(
IN _idVehiculos INT )
BEGIN 
DELETE FROM vehiculos WHERE idVehiculos = _idVehiculos;
END;;

/*Busqueda por nombre*/
delimiter ;; 
CREATE PROCEDURE showVehiculo(
_filtro VARCHAR(100))
BEGIN 
SELECT v.nombreCliente,v.telefono,v.foto,v.turno,v.costo  FROM vehiculos v  WHERE v.nombreCliente  LIKE _filtro;
END;;

/*---------------------------Procedure Tareas----------------------------------*/
delimiter ;;
CREATE PROCEDURE insertarTarea(  
IN _fkIdVehiculos INT, 
IN _fkidUsuarios INT,
IN _idTareas INT)
BEGIN 
INSERT INTO tareas VALUES(NULL,_fkIdVehiculos,_fkidUsuarios);
END;;

delimiter ;;
CREATE PROCEDURE actualizarTarea(
IN _fkIdVehiculos INT, 
IN _fkidUsuarios INT,
IN _idTareas INT)
BEGIN 
UPDATE tareas SET fkIdVehiculos=_fkIdVehiculos,fkidUsuarios=_fkidUsuarios WHERE idTareas=_idTareas;
END;;

delimiter ;;
CREATE PROCEDURE borrarTarea(
IN _idTareas INT )
BEGIN 
DELETE FROM Tareas WHERE idTareas = _idTareas;
END;;

/*Busqueda por nombre*/
delimiter ;; 
CREATE PROCEDURE showTarea(
_filtro VARCHAR(100))
BEGIN 
SELECT u.nombreUsuario,v.nombreCliente,v.costo  FROM tareas t,usuarios u,vehiculos v  WHERE t.fkIdVehiculos=v.idVehiculos AND t.fkidUsuarios=u.idUsuarios AND u.nombreUsuario  LIKE _filtro;
END;;
/*---------------------------Procedures TERMINADOS----------------------------------*/