-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2022 a las 08:53:56
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
(1, 'Contabilidad', 'Sevilla'),
(2, 'Ingeniería', 'Pamplona'),
(12, 'Investigación', 'Valencia'),
(16, 'Marketing', 'Yo qué sé');

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
-- Estructura de tabla para la tabla `emp`
--

CREATE TABLE `emp` (
  `EMP_NO` int(11) NOT NULL,
  `APELLIDO` varchar(40) DEFAULT NULL,
  `OFICIO` varchar(40) DEFAULT NULL,
  `DIR` int(11) DEFAULT NULL,
  `FECHA_ALT` date DEFAULT NULL,
  `SALARIO` int(11) DEFAULT NULL,
  `COMISION` int(11) DEFAULT NULL,
  `DEPT_NO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `emp`
--

INSERT INTO `emp` (`EMP_NO`, `APELLIDO`, `OFICIO`, `DIR`, `FECHA_ALT`, `SALARIO`, `COMISION`, `DEPT_NO`) VALUES
(7369, 'sanchez', 'EMPLEADO', 7902, '1994-12-17', 104000, 0, 20),
(7499, 'arroyo', 'VENDEDOR', 7698, '1994-02-20', 208000, 39000, 30),
(7521, 'sala', 'VENDEDOR', 7698, '1995-02-22', 162500, 65000, 30),
(7566, 'jimenez', 'DIRECTOR', 7839, '1995-04-02', 386750, 0, 20),
(7654, 'martin', 'VENDEDOR', 7698, '1955-07-29', 162500, 182000, 30),
(7698, 'negro', 'DIRECTOR', 7839, '1995-05-01', 370500, 0, 30),
(7782, 'cerezo', 'DIRECTOR', 7839, '1995-06-09', 318500, 0, 10),
(7788, 'gil', 'ANALISTA', 7566, '1995-11-09', 390000, 0, 20),
(7839, 'rey', 'PRESIDENTE', NULL, '1995-11-17', 650000, NULL, 10),
(7844, 'tovar', 'VENDEDOR', 7698, '1995-07-08', 195000, 0, 30),
(7876, 'alonso', 'EMPLEADO', 7788, '1995-07-23', 143000, 0, 20),
(7900, 'jimeno', 'EMPLEADO', 7698, '1995-12-03', 123500, 0, 30),
(7902, 'fernandez', 'ANALISTA', 7566, '1995-12-11', 390000, 0, 20),
(7934, 'muñoz', 'EMPLEADO', 7782, '1996-01-23', 169000, 0, 10);

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
-- Indices de la tabla `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`EMP_NO`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
