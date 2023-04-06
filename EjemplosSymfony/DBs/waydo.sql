-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2022 a las 13:20:32
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `waydo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `CODACTIVIDAD` int(11) NOT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `MUNICIPIO` varchar(50) DEFAULT NULL,
  `DISTRITO` varchar(50) DEFAULT NULL,
  `SENSEI` varchar(20) DEFAULT NULL,
  `PRECIO` decimal(5,2) DEFAULT NULL,
  `CUPO` int(11) DEFAULT NULL,
  `FECHA_INICIO` datetime DEFAULT NULL,
  `FECHA_FIN` datetime DEFAULT NULL,
  `EDICION` int(4) DEFAULT NULL,
  `DESCRIPCION` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`CODACTIVIDAD`, `NOMBRE`, `MUNICIPIO`, `DISTRITO`, `SENSEI`, `PRECIO`, `CUPO`, `FECHA_INICIO`, `FECHA_FIN`, `EDICION`, `DESCRIPCION`) VALUES
(1, 'TALLER DE ESCRITURA', 'MADRID', 'ARGANZUELA', 'sensei0', '2.50', 15, '2022-08-01 16:00:00', '2022-08-01 18:00:00', NULL, 'Escribir es la representación de conceptos o ideas sobre una superficie a través de símbolos o códigos designados por la forma escrita de un lenguaje. Escribir deriva del latín scribire que a su vez tiene una raíz indoeuropea que indicaba la ación de trazar o rayar.'),
(2, 'GO', 'MADRID', 'CENTRO', 'sensei1', '3.25', 20, '2022-09-01 16:00:00', '2022-09-01 18:00:00', NULL, 'El go es un juego de tablero de estrategia para dos personas. Se originó en China hace más de 2500 años.​​​ Fue considerado una de las cuatro artes esenciales de la antigüedad china. Los textos más antiguos que hacen referencia al go son las analectas de Confucio.'),
(3, 'FÚTBOL 11', 'MADRID', 'CHAMBERÍ', 'sensei2', '12.00', 14, '2022-10-01 16:00:00', '2022-10-01 18:00:00', NULL, 'Juego entre dos equipos de once jugadores cada uno, cuya finalidad es hacer entrar un balón por una portería conforme a reglas determinadas, de las que la más característica es que no puede ser tocado con las manos ni con los brazos.'),
(4, 'FÚTBOL 11', 'MADRID', 'FUENCARRAL - EL PARDO', 'sensei3', '7.00', 14, '2022-11-01 16:00:00', '2022-11-01 18:00:00', NULL, 'Juego entre dos equipos de once jugadores cada uno, cuya finalidad es hacer entrar un balón por una portería conforme a reglas determinadas, de las que la más característica es que no puede ser tocado con las manos ni con los brazos.'),
(5, 'AJEDREZ', 'MADRID', 'RETIRO', 'sensei4', '0.00', 8, '2022-12-01 16:00:00', '2022-12-01 18:00:00', NULL, 'Juego de mesa en el que se enfrentan dos jugadores, cada uno de los cuales tiene 16 piezas de valores diversos que puede mover, según ciertas reglas, sobre un tablero dividido en 64 cuadros alternativamente blancos y negros; gana el jugador que consigue dar mate al rey de su contrincante.'),
(6, 'PADEL', 'MADRID', 'RETIRO', 'sensei5', '12.50', 4, '2022-12-01 19:00:00', '2022-08-01 20:00:00', NULL, 'Juego entre dos parejas, muy parecido al tenis, pero que se juega entre cuatro paredes y en el que la pelota se golpea con una pala de mango corto.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizacion`
--

CREATE TABLE `localizacion` (
  `PAIS` varchar(30) DEFAULT NULL,
  `COMUNIDAD` varchar(50) DEFAULT NULL,
  `MUNICIPIO` varchar(50) NOT NULL,
  `DISTRITO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `localizacion`
--

INSERT INTO `localizacion` (`PAIS`, `COMUNIDAD`, `MUNICIPIO`, `DISTRITO`) VALUES
('ESPAÑA', 'MADRID', 'MADRID', 'ARGANZUELA'),
('ESPAÑA', 'MADRID', 'MADRID', 'BARAJAS'),
('ESPAÑA', 'MADRID', 'MADRID', 'CARABANCHEL'),
('ESPAÑA', 'MADRID', 'MADRID', 'CENTRO'),
('ESPAÑA', 'MADRID', 'MADRID', 'CHAMARTIN'),
('ESPAÑA', 'MADRID', 'MADRID', 'CHAMBERÍ'),
('ESPAÑA', 'MADRID', 'MADRID', 'CIUDAD LINEAL'),
('ESPAÑA', 'MADRID', 'MADRID', 'FUENCARRAL - EL PARDO'),
('ESPAÑA', 'MADRID', 'MADRID', 'HORTALEZA'),
('ESPAÑA', 'MADRID', 'MADRID', 'LATINA'),
('ESPAÑA', 'MADRID', 'MADRID', 'MONCLOA - ARAVACA'),
('ESPAÑA', 'MADRID', 'MADRID', 'MORATALAZ'),
('ESPAÑA', 'MADRID', 'MADRID', 'PUENTE DE VALLECAS'),
('ESPAÑA', 'MADRID', 'MADRID', 'RETIRO'),
('ESPAÑA', 'MADRID', 'MADRID', 'SALAMANCA'),
('ESPAÑA', 'MADRID', 'MADRID', 'SAN BLAS'),
('ESPAÑA', 'MADRID', 'MADRID', 'TETUAN'),
('ESPAÑA', 'MADRID', 'MADRID', 'USERA'),
('ESPAÑA', 'MADRID', 'MADRID', 'VICALVARO'),
('ESPAÑA', 'MADRID', 'MADRID', 'VILLA DE VALLECAS'),
('ESPAÑA', 'MADRID', 'MADRID', 'VILLAVERDE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pupilos`
--

CREATE TABLE `pupilos` (
  `NICK` varchar(20) NOT NULL,
  `EMAIL` varchar(40) DEFAULT NULL,
  `TELEFONO` int(13) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `NOMBRE` varchar(20) DEFAULT NULL,
  `APELLIDOS` varchar(20) DEFAULT NULL,
  `FNAC` date DEFAULT NULL,
  `MUNICIPIO` varchar(50) DEFAULT NULL,
  `DISTRITO` varchar(50) DEFAULT NULL,
  `DESCRIPCION` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pupilos`
--

INSERT INTO `pupilos` (`NICK`, `EMAIL`, `TELEFONO`, `PASSWORD`, `NOMBRE`, `APELLIDOS`, `FNAC`, `MUNICIPIO`, `DISTRITO`, `DESCRIPCION`) VALUES
('pupilo0', 'pupilo0@waydo.com', 0, '1234', 'nombre', 'apellido', '1991-01-01', 'MADRID', 'ARGANZUELA', ''),
('pupilo1', 'pupilo1@waydo.com', 0, '1234', 'nombre', 'apellido', '1992-02-02', 'MADRID', 'CHAMBERÍ', ''),
('pupilo2', 'pupilo2@waydo.com', 0, '1234', 'nombre', 'apellido', '1993-03-03', 'MADRID', 'FUENCARRAL - EL PARDO', ''),
('pupilo3', 'pupilo3@waydo.com', 0, '1234', 'nombre', 'apellido', '1994-04-04', 'MADRID', 'MONCLOA - ARAVACA', ''),
('pupilo4', 'pupilo4@waydo.com', 0, '1234', 'nombre', 'apellido', '1995-05-05', 'MADRID', 'RETIRO', ''),
('pupilo5', 'pupilo5@waydo.com', 0, '1234', 'nombre', 'apellido', '1996-06-06', 'MADRID', 'USERA', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pupilos_actividades`
--

CREATE TABLE `pupilos_actividades` (
  `NICK_PA` varchar(20) NOT NULL,
  `CODACTIVIDAD_PA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pupilos_actividades`
--

INSERT INTO `pupilos_actividades` (`NICK_PA`, `CODACTIVIDAD_PA`) VALUES
('pupilo0', 1),
('pupilo0', 2),
('pupilo1', 2),
('pupilo2', 3),
('pupilo3', 1),
('pupilo4', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `senseis`
--

CREATE TABLE `senseis` (
  `NICK` varchar(20) NOT NULL,
  `EMAIL` varchar(40) DEFAULT NULL,
  `TELEFONO` int(13) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `NOMBRE` varchar(20) DEFAULT NULL,
  `APELLIDOS` varchar(20) DEFAULT NULL,
  `FNAC` date DEFAULT NULL,
  `MUNICIPIO` varchar(50) DEFAULT NULL,
  `DISTRITO` varchar(50) DEFAULT NULL,
  `DESCRIPCION` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `senseis`
--

INSERT INTO `senseis` (`NICK`, `EMAIL`, `TELEFONO`, `PASSWORD`, `NOMBRE`, `APELLIDOS`, `FNAC`, `MUNICIPIO`, `DISTRITO`, `DESCRIPCION`) VALUES
('sensei0', 'sensei0@waydo.com', 0, '1234', 'nombre', 'apellido', '1991-01-01', 'MADRID', 'ARGANZUELA', ''),
('sensei1', 'sensei1@waydo.com', 0, '1234', 'nombre', 'apellido', '1992-02-02', 'MADRID', 'CENTRO', ''),
('sensei2', 'sensei2@waydo.com', 0, '1234', 'nombre', 'apellido', '1993-03-03', 'MADRID', 'CHAMBERÍ', ''),
('sensei3', 'sensei3@waydo.com', 0, '1234', 'nombre', 'apellido', '1994-04-04', 'MADRID', 'FUENCARRAL - EL PARDO', ''),
('sensei4', 'sensei4@waydo.com', 0, '1234', 'nombre', 'apellido', '1995-05-05', 'MADRID', 'RETIRO', ''),
('sensei5', 'sensei5@waydo.com', 0, '1234', 'nombre', 'apellido', '1996-06-06', 'MADRID', 'RETIRO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `senseis_actividades`
--

CREATE TABLE `senseis_actividades` (
  `NICK_SA` varchar(20) NOT NULL,
  `CODACTIVIDAD_SA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `senseis_actividades`
--

INSERT INTO `senseis_actividades` (`NICK_SA`, `CODACTIVIDAD_SA`) VALUES
('sensei5', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `CODTRANSACCION` int(11) NOT NULL,
  `CODACTIVIDAD` int(11) DEFAULT NULL,
  `EMISOR` varchar(20) DEFAULT NULL,
  `RECEPTOR` varchar(20) DEFAULT NULL,
  `CANTIDAD` decimal(5,2) DEFAULT NULL,
  `ESTADO` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`CODTRANSACCION`, `CODACTIVIDAD`, `EMISOR`, `RECEPTOR`, `CANTIDAD`, `ESTADO`) VALUES
(1, 5, 'pupilo5', 'sensei5', '12.50', 'PAGADO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`CODACTIVIDAD`),
  ADD KEY `DISTRITO` (`DISTRITO`,`MUNICIPIO`),
  ADD KEY `SENSEI` (`SENSEI`);

--
-- Indices de la tabla `localizacion`
--
ALTER TABLE `localizacion`
  ADD PRIMARY KEY (`DISTRITO`,`MUNICIPIO`);

--
-- Indices de la tabla `pupilos`
--
ALTER TABLE `pupilos`
  ADD PRIMARY KEY (`NICK`),
  ADD KEY `DISTRITO` (`DISTRITO`,`MUNICIPIO`);

--
-- Indices de la tabla `pupilos_actividades`
--
ALTER TABLE `pupilos_actividades`
  ADD PRIMARY KEY (`NICK_PA`,`CODACTIVIDAD_PA`),
  ADD KEY `CODACTIVIDAD_PA` (`CODACTIVIDAD_PA`);

--
-- Indices de la tabla `senseis`
--
ALTER TABLE `senseis`
  ADD PRIMARY KEY (`NICK`),
  ADD KEY `DISTRITO` (`DISTRITO`,`MUNICIPIO`);

--
-- Indices de la tabla `senseis_actividades`
--
ALTER TABLE `senseis_actividades`
  ADD PRIMARY KEY (`NICK_SA`,`CODACTIVIDAD_SA`),
  ADD KEY `CODACTIVIDAD_SA` (`CODACTIVIDAD_SA`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`CODTRANSACCION`),
  ADD KEY `CODACTIVIDAD` (`CODACTIVIDAD`),
  ADD KEY `EMISOR` (`EMISOR`),
  ADD KEY `RECEPTOR` (`RECEPTOR`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `CODACTIVIDAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `CODTRANSACCION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`DISTRITO`,`MUNICIPIO`) REFERENCES `localizacion` (`DISTRITO`, `MUNICIPIO`),
  ADD CONSTRAINT `actividades_ibfk_2` FOREIGN KEY (`SENSEI`) REFERENCES `senseis` (`NICK`);

--
-- Filtros para la tabla `pupilos`
--
ALTER TABLE `pupilos`
  ADD CONSTRAINT `pupilos_ibfk_1` FOREIGN KEY (`DISTRITO`,`MUNICIPIO`) REFERENCES `localizacion` (`DISTRITO`, `MUNICIPIO`);

--
-- Filtros para la tabla `pupilos_actividades`
--
ALTER TABLE `pupilos_actividades`
  ADD CONSTRAINT `pupilos_actividades_ibfk_1` FOREIGN KEY (`NICK_PA`) REFERENCES `pupilos` (`NICK`),
  ADD CONSTRAINT `pupilos_actividades_ibfk_2` FOREIGN KEY (`CODACTIVIDAD_PA`) REFERENCES `actividades` (`CODACTIVIDAD`);

--
-- Filtros para la tabla `senseis`
--
ALTER TABLE `senseis`
  ADD CONSTRAINT `senseis_ibfk_1` FOREIGN KEY (`DISTRITO`,`MUNICIPIO`) REFERENCES `localizacion` (`DISTRITO`, `MUNICIPIO`);

--
-- Filtros para la tabla `senseis_actividades`
--
ALTER TABLE `senseis_actividades`
  ADD CONSTRAINT `senseis_actividades_ibfk_1` FOREIGN KEY (`NICK_SA`) REFERENCES `senseis` (`NICK`),
  ADD CONSTRAINT `senseis_actividades_ibfk_2` FOREIGN KEY (`CODACTIVIDAD_SA`) REFERENCES `actividades` (`CODACTIVIDAD`);

--
-- Filtros para la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD CONSTRAINT `transacciones_ibfk_1` FOREIGN KEY (`CODACTIVIDAD`) REFERENCES `actividades` (`CODACTIVIDAD`),
  ADD CONSTRAINT `transacciones_ibfk_2` FOREIGN KEY (`EMISOR`) REFERENCES `pupilos` (`NICK`),
  ADD CONSTRAINT `transacciones_ibfk_3` FOREIGN KEY (`RECEPTOR`) REFERENCES `senseis` (`NICK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
