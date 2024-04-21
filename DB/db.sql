CREATE DATABASE carwash;

CREATE TABLE usuarios(idUsuarios INT PRIMARY KEY AUTO_INCREMENT, 
nombre VARCHAR(150), nombreUsuario VARCHAR(15), tipoUsuario VARCHAR(50), 
correo VARCHAR(50), contraseña VARCHAR(20));

CREATE TABLE vehiculos(idVehiculos INT PRIMARY KEY AUTO_INCREMENT, 
nombreCliente VARCHAR(150), placa VARCHAR(10), telefono VARCHAR(15), 
modelo VARCHAR(30), caracteristica DOUBLE, foto LONGBLOB, turno INT, costo DOUBLE); 

CREATE TABLE tareas(idTareas INT PRIMARY KEY AUTO_INCREMENT, fkIdVehiculos INT, fkidUsuarios INT, 
FOREIGN KEY(fkIdVehiculos) REFERENCES vehiculos(idVehiculos), 
FOREIGN KEY(fkidUsuarios) REFERENCES usuarios(idUsuarios));