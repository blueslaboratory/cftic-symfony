DROP DATABASE WAYDO;
CREATE DATABASE WAYDO;
USE WAYDO;


DROP TABLE LOCALIZACION;
CREATE TABLE LOCALIZACION(
	PAIS VARCHAR(30),
    COMUNIDAD VARCHAR(50),
    MUNICIPIO VARCHAR(50),
    DISTRITO VARCHAR(50),
    
    PRIMARY KEY (DISTRITO, MUNICIPIO)
)ENGINE=InnoDB;

INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'ARGANZUELA');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'BARAJAS');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'CARABANCHEL');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'CENTRO');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'CHAMARTIN');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'CHAMBERÍ');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'CIUDAD LINEAL');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'FUENCARRAL - EL PARDO');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'HORTALEZA');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'LATINA');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'MONCLOA - ARAVACA');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'MORATALAZ');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'PUENTE DE VALLECAS');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'RETIRO');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'SALAMANCA');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'SAN BLAS');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'TETUAN');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'USERA');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'VICALVARO');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'VILLA DE VALLECAS');
INSERT INTO LOCALIZACION VALUES('ESPAÑA', 'MADRID', 'MADRID', 'VILLAVERDE');


DROP TABLE PUPILOS;
CREATE TABLE PUPILOS(
	NICK VARCHAR(20),
    EMAIL VARCHAR(40),
    TELEFONO INTEGER(13),
    PASSWORD VARCHAR(20),
    NOMBRE VARCHAR(20),
    APELLIDOS VARCHAR(20),
    FNAC DATE,
    DISTRITO VARCHAR(50),
    DESCRIPCION MEDIUMTEXT,
    
    PRIMARY KEY (NICK),
    FOREIGN KEY (DISTRITO) REFERENCES LOCALIZACION(DISTRITO)
)ENGINE=InnoDB;

DELETE FROM PUPILOS WHERE NICK='';
INSERT INTO PUPILOS VALUES('pupilo0', 'pupilo0@waydo.com', '000000000', '1234', 'nombre', 'apellido', '1991-01-01', 'ARGANZUELA', '');
INSERT INTO PUPILOS VALUES('pupilo1', 'pupilo1@waydo.com', '000000000', '1234', 'nombre', 'apellido', '1992-02-02', 'CHAMBERÍ', '');
INSERT INTO PUPILOS VALUES('pupilo2', 'pupilo2@waydo.com', '000000000', '1234', 'nombre', 'apellido', '1993-03-03', 'FUENCARRAL - EL PARDO', '');
INSERT INTO PUPILOS VALUES('pupilo3', 'pupilo3@waydo.com', '000000000', '1234', 'nombre', 'apellido', '1994-04-04', 'MONCLOA - ARAVACA', '');
INSERT INTO PUPILOS VALUES('pupilo4', 'pupilo4@waydo.com', '000000000', '1234', 'nombre', 'apellido', '1995-05-05', 'RETIRO', '');
INSERT INTO PUPILOS VALUES('pupilo5', 'pupilo5@waydo.com', '000000000', '1234', 'nombre', 'apellido', '1996-06-06', 'USERA', '');


DROP TABLE SENSEIS;
CREATE TABLE SENSEIS(
	NICK VARCHAR(20),
    EMAIL VARCHAR(40),
    TELEFONO INTEGER(13),
    PASSWORD VARCHAR(20),
    NOMBRE VARCHAR(20),
    APELLIDOS VARCHAR(20),
    FNAC DATE,
    DISTRITO VARCHAR(50),
    DESCRIPCION MEDIUMTEXT,
    
    PRIMARY KEY (NICK),
    FOREIGN KEY (DISTRITO) REFERENCES LOCALIZACION(DISTRITO)
)ENGINE=InnoDB;

DELETE FROM PUPILOS WHERE NICK='sensei5';
INSERT INTO SENSEIS VALUES('sensei0', 'sensei0@waydo.com', '000000000', '1234', 'nombre', 'apellido', '1991-01-01', 'ARGANZUELA', '');
INSERT INTO SENSEIS VALUES('sensei1', 'sensei1@waydo.com', '000000000', '1234', 'nombre', 'apellido', '1992-02-02', 'CENTRO', '');
INSERT INTO SENSEIS VALUES('sensei2', 'sensei2@waydo.com', '000000000', '1234', 'nombre', 'apellido', '1993-03-03', 'CHAMBERÍ', '');
INSERT INTO SENSEIS VALUES('sensei3', 'sensei3@waydo.com', '000000000', '1234', 'nombre', 'apellido', '1994-04-04', 'FUENCARRAL - EL PARDO', '');
INSERT INTO SENSEIS VALUES('sensei4', 'sensei4@waydo.com', '000000000', '1234', 'nombre', 'apellido', '1995-05-05', 'RETIRO', '');
INSERT INTO SENSEIS VALUES('sensei5', 'sensei5@waydo.com', '000000000', '1234', 'nombre', 'apellido', '1996-06-06', 'RETIRO', '');


DROP TABLE ACTIVIDADES;
CREATE TABLE ACTIVIDADES(
	CODACTIVIDAD INT AUTO_INCREMENT,
    NOMBRE VARCHAR(50),
    DISTRITO VARCHAR(50),
    SENSEI VARCHAR(20),
    PRECIO DECIMAL(5,2),
    CUPO INT,
    FECHA_INICIO DATETIME, 
    FECHA_FIN DATETIME,
    EDICION INT(4),
    DESCRIPCION MEDIUMTEXT,
    
    PRIMARY KEY (CODACTIVIDAD),
    FOREIGN KEY (DISTRITO) REFERENCES LOCALIZACION(DISTRITO),
    FOREIGN KEY (SENSEI) REFERENCES SENSEIS(NICK)
)ENGINE=InnoDB;

INSERT INTO ACTIVIDADES(NOMBRE, DISTRITO, SENSEI, PRECIO, CUPO, FECHA_INICIO, FECHA_FIN, DESCRIPCION) 
VALUES('TALLER DE ESCRITURA', 'ARGANZUELA', 'sensei0', 2.5, 15, '2022-08-01 16:00:00', '2022-08-01 18:00:00', 'Escribir es la representación de conceptos o ideas sobre una superficie a través de símbolos o códigos designados por la forma escrita de un lenguaje. Escribir deriva del latín scribire que a su vez tiene una raíz indoeuropea que indicaba la ación de trazar o rayar.');
INSERT INTO ACTIVIDADES(NOMBRE, DISTRITO, SENSEI, PRECIO, CUPO, FECHA_INICIO, FECHA_FIN, DESCRIPCION) 
VALUES('GO', 'CENTRO', 'sensei1', 3.25, 20, '2022-08-01 16:00:00', '2022-08-01 18:00:00', 'El go es un juego de tablero de estrategia para dos personas. Se originó en China hace más de 2500 años.​​​ Fue considerado una de las cuatro artes esenciales de la antigüedad china. Los textos más antiguos que hacen referencia al go son las analectas de Confucio.');
INSERT INTO ACTIVIDADES(NOMBRE, DISTRITO, SENSEI, PRECIO, CUPO, FECHA_INICIO, FECHA_FIN, DESCRIPCION) 
VALUES('FÚTBOL 11', 'CHAMBERÍ', 'sensei2', 12, 14, '2022-08-01 16:00:00', '2022-08-01 18:00:00', 'Juego entre dos equipos de once jugadores cada uno, cuya finalidad es hacer entrar un balón por una portería conforme a reglas determinadas, de las que la más característica es que no puede ser tocado con las manos ni con los brazos.');
INSERT INTO ACTIVIDADES(NOMBRE, DISTRITO, SENSEI, PRECIO, CUPO, FECHA_INICIO, FECHA_FIN, DESCRIPCION) 
VALUES('FÚTBOL 11', 'FUENCARRAL - EL PARDO', 'sensei3', 7, 14, '2022-08-01 16:00:00', '2022-08-01 18:00:00', 'Juego entre dos equipos de once jugadores cada uno, cuya finalidad es hacer entrar un balón por una portería conforme a reglas determinadas, de las que la más característica es que no puede ser tocado con las manos ni con los brazos.');
INSERT INTO ACTIVIDADES(NOMBRE, DISTRITO, SENSEI, PRECIO, CUPO, FECHA_INICIO, FECHA_FIN, DESCRIPCION) 
VALUES('AJEDREZ', 'RETIRO', 'sensei4', 0, 8, '2022-08-01 16:00:00', '2022-08-01 18:00:00', 'Juego de mesa en el que se enfrentan dos jugadores, cada uno de los cuales tiene 16 piezas de valores diversos que puede mover, según ciertas reglas, sobre un tablero dividido en 64 cuadros alternativamente blancos y negros; gana el jugador que consigue dar mate al rey de su contrincante.');
INSERT INTO ACTIVIDADES(NOMBRE, DISTRITO, SENSEI, PRECIO, CUPO, FECHA_INICIO, FECHA_FIN, DESCRIPCION) 
VALUES('PADEL', 'RETIRO', 'sensei5', 12.50, 4, '2022-08-01 16:00:00', '2022-08-01 18:00:00', 'Juego entre dos parejas, muy parecido al tenis, pero que se juega entre cuatro paredes y en el que la pelota se golpea con una pala de mango corto.');


/* 
AQUI ES DONDE DA EL ERROR EL COMANDO:
C:\xampp\htdocs\CFTIC\Proyecto Waydo\waydo> php bin/console doctrine:mapping:import "App\Entity" annotation --path=src/Entity
Property "nick" in "Actividades" was already declared, but it must be declared only once 
Prueba 1:
 - modificar nombres de las claves foraneas para que no coincidan
*/
DROP TABLE PUPILOS_ACTIVIDADES;
CREATE TABLE PUPILOS_ACTIVIDADES(
	NICK_PA VARCHAR(20),
	CODACTIVIDAD_PA INT,
    FOREIGN KEY (NICK_PA) REFERENCES PUPILOS(NICK),
    FOREIGN KEY (CODACTIVIDAD_PA) REFERENCES ACTIVIDADES(CODACTIVIDAD),
    PRIMARY KEY (NICK_PA, CODACTIVIDAD_PA)
)ENGINE=InnoDB;

INSERT INTO PUPILOS_ACTIVIDADES VALUES('pupilo0', 1);
INSERT INTO PUPILOS_ACTIVIDADES VALUES('pupilo0', 2);
INSERT INTO PUPILOS_ACTIVIDADES VALUES('pupilo1', 2);
INSERT INTO PUPILOS_ACTIVIDADES VALUES('pupilo2', 3);
INSERT INTO PUPILOS_ACTIVIDADES VALUES('pupilo3', 1);
INSERT INTO PUPILOS_ACTIVIDADES VALUES('pupilo4', 4);


DROP TABLE SENSEIS_ACTIVIDADES;
CREATE TABLE SENSEIS_ACTIVIDADES(
	NICK_SA VARCHAR(20),
	CODACTIVIDAD_SA INT,
    FOREIGN KEY (NICK_SA) REFERENCES SENSEIS(NICK),
    FOREIGN KEY (CODACTIVIDAD_SA) REFERENCES ACTIVIDADES(CODACTIVIDAD),
    PRIMARY KEY (NICK_SA, CODACTIVIDAD_SA)
)ENGINE=InnoDB;

INSERT INTO SENSEIS_ACTIVIDADES VALUES('sensei0', 1);
INSERT INTO SENSEIS_ACTIVIDADES VALUES('sensei1', 2);
INSERT INTO SENSEIS_ACTIVIDADES VALUES('sensei2', 3);
INSERT INTO SENSEIS_ACTIVIDADES VALUES('sensei3', 4);
INSERT INTO SENSEIS_ACTIVIDADES VALUES('sensei4', 5);
INSERT INTO SENSEIS_ACTIVIDADES VALUES('sensei5', 6);


DROP TABLE TRANSACCIONES;
CREATE TABLE TRANSACCIONES(
	CODTRANSACCION INT AUTO_INCREMENT,
    CODACTIVIDAD INT,
    EMISOR VARCHAR(20),
    RECEPTOR VARCHAR(20),
    CANTIDAD DECIMAL(5,2),
    ESTADO VARCHAR(15),
    
    PRIMARY KEY (CODTRANSACCION),
    FOREIGN KEY (CODACTIVIDAD) REFERENCES ACTIVIDADES(CODACTIVIDAD),
    FOREIGN KEY (EMISOR) REFERENCES PUPILOS(NICK),
    FOREIGN KEY (RECEPTOR) REFERENCES SENSEIS(NICK)
)ENGINE=InnoDB;

INSERT INTO TRANSACCIONES (CODACTIVIDAD, EMISOR, RECEPTOR, CANTIDAD, ESTADO) 
VALUES(1, 'pupilo0', 'sensei0', 2.5, 'PAGADO');
INSERT INTO TRANSACCIONES (CODACTIVIDAD, EMISOR, RECEPTOR, CANTIDAD, ESTADO) 
VALUES(2, 'pupilo1', 'sensei1', 3.2, 'PAGADO');
INSERT INTO TRANSACCIONES (CODACTIVIDAD, EMISOR, RECEPTOR, CANTIDAD, ESTADO) 
VALUES(3, 'pupilo2', 'sensei2', 12, 'PAGADO');
INSERT INTO TRANSACCIONES (CODACTIVIDAD, EMISOR, RECEPTOR, CANTIDAD, ESTADO) 
VALUES(4, 'pupilo3', 'sensei3', 7, 'PAGADO');
INSERT INTO TRANSACCIONES (CODACTIVIDAD, EMISOR, RECEPTOR, CANTIDAD, ESTADO) 
VALUES(5, 'pupilo4', 'sensei4', 0, 'FREE');
INSERT INTO TRANSACCIONES (CODACTIVIDAD, EMISOR, RECEPTOR, CANTIDAD, ESTADO) 
VALUES(5, 'pupilo5', 'sensei5', 12.5, 'PAGADO');