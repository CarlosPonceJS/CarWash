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



