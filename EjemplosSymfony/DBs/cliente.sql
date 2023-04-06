-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2022 a las 13:20:14
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
-- Base de datos: `cliente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidoras`
--

CREATE TABLE `distribuidoras` (
  `DISTRIBUIDORA` varchar(40) NOT NULL,
  `IMAGEN` varchar(20) DEFAULT NULL,
  `INTERNET` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `distribuidoras`
--

INSERT INTO `distribuidoras` (`DISTRIBUIDORA`, `IMAGEN`, `INTERNET`) VALUES
('20 th Centyry Fox', '20century.jpg', 'http://www.fox.es/'),
('Aurum', 'aurum.gif', 'http://www.aurum.es/'),
('Columbia Tristar', 'columbia.jpg', 'http://www.columbia-tristar.es/'),
('Filmax', 'filmax.gif', 'http://www.filmax.com/'),
('Lauren Films', 'laurenfilmx.gif', 'http://www.laurenfilm.es/'),
('Lola Films', 'lolafilms.gif', 'http://www.lolafilms.com/'),
('MGM', 'mgm.jpg', 'http://www.mgm.com/'),
('Miramax', 'miramax.jpg', 'http://www.miramax.com/'),
('New Line Cinema', 'newlinecinema.jpg', 'http://www.newline.com/'),
('Tri-Pictures', 'tripictures.gif', 'http://www.tripictures.com/'),
('UIP - Paramount,Universal y Dreamworks', 'paramount.jpg', 'http://www.uip.es/'),
('Walt Disney', 'waltdisney.jpg', 'http://www.disney.com/'),
('Warner Bross', 'warner.gif', 'http://www.warnerbros.com/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichacliente`
--

CREATE TABLE `fichacliente` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `APELLIDO1` varchar(30) DEFAULT NULL,
  `APELLIDO2` varchar(30) DEFAULT NULL,
  `DOMICILIO` varchar(50) DEFAULT NULL,
  `CIUDAD` varchar(30) DEFAULT NULL,
  `SEXO` varchar(10) DEFAULT NULL,
  `SO` varchar(40) DEFAULT NULL,
  `COMENTARIO` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fichacliente`
--

INSERT INTO `fichacliente` (`ID`, `NOMBRE`, `APELLIDO1`, `APELLIDO2`, `DOMICILIO`, `CIUDAD`, `SEXO`, `SO`, `COMENTARIO`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(3, 'Pepe', 'Perez', 'Garcia', 'C/ Pepa', 'Barcelona', 'Hombre', 'Mac', 'Texto por defecto...\r\nVoy a escribir un comentario porque me apetece mucho mucho muchísimo'),
(4, 'Juan', 'Percebes', 'Mapache', 'C/ Pecholobo', 'Valencia', 'Mujer', 'Linux,Windows,Mac', 'Mi comentario favorito');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `distribuidoras`
--
ALTER TABLE `distribuidoras`
  ADD PRIMARY KEY (`DISTRIBUIDORA`);

--
-- Indices de la tabla `fichacliente`
--
ALTER TABLE `fichacliente`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fichacliente`
--
ALTER TABLE `fichacliente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
