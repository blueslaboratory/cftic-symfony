-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2022 a las 13:19:53
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
-- Base de datos: `hospital`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `BORRARDEPT` (IN `NUM` INT)   DELETE FROM DEPT WHERE ID = NUM$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarDoctor` (IN `h_cod` INT(11), IN `ape` VARCHAR(50), IN `esp` VARCHAR(50), IN `sal` INT(11))   INSERT INTO doctor(hospital_cod, apellido, especialidad, salario) 
VALUES(h_cod, ape, esp, sal)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dept`
--

CREATE TABLE `dept` (
  `id` int(11) NOT NULL,
  `dnombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dept`
--

INSERT INTO `dept` (`id`, `dnombre`, `loc`) VALUES
(1, 'Programacion', 'Pamplona'),
(2, 'Juan', 'Pamplona'),
(4, 'Finanzas', 'Cadiz'),
(11, 'Recursos Humanos', 'Barcelona'),
(12, 'Investigación', 'Valencia'),
(13, 'Ventas', 'Madrid'),
(14, 'Ingenieria', 'Galicia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `hospital_cod` int(11) DEFAULT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `especialidad` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`id`, `hospital_cod`, `apellido`, `especialidad`, `salario`) VALUES
(1, 10, 'Perez', 'Cardiologia', 30000),
(2, 0, 'Pulmonología', '10', 24000),
(3, 0, 'Pulmonología', '10', 24000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_cama` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `hospital`
--

INSERT INTO `hospital` (`id`, `nombre`, `direccion`, `telefono`, `num_cama`) VALUES
(4, 'Jimenez Diaz', 'Glorieta cerca Moncloa', '6578552', 10),
(5, 'La Paz', 'Metro Begoña', '6812582', 90),
(6, '', '', '', 20);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dept`
--
ALTER TABLE `dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
