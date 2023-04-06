-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2022 a las 13:19:59
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
-- Base de datos: `hospital_prueba`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarPaciente` (IN `insc` INT(11), IN `ape` VARCHAR(40), IN `dir` VARCHAR(50), IN `fnac` DATE, IN `sex` VARCHAR(1), IN `numSS` INT(11))   INSERT INTO enfermo(inscripcion, apellido, direccion, fecha_nac, sexo, nss) 
VALUES(insc, ape, dir, fnac, sex, numSS)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor_prueba`
--

CREATE TABLE `doctor_prueba` (
  `HOSPITAL_COD` int(11) DEFAULT NULL,
  `DOCTOR_NO` int(11) NOT NULL,
  `APELLIDO` varchar(50) DEFAULT NULL,
  `ESPECIALIDAD` varchar(40) DEFAULT NULL,
  `SALARIO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `doctor_prueba`
--

INSERT INTO `doctor_prueba` (`HOSPITAL_COD`, `DOCTOR_NO`, `APELLIDO`, `ESPECIALIDAD`, `SALARIO`) VALUES
(17, 120, 'Curro F.', 'Urologia', 250000),
(22, 386, 'Cabeza D.', 'Psiquiatria', 125000),
(22, 398, 'Best K.', 'Urologia', 150000),
(19, 435, 'Lopez A.', 'Cardiologia', 350000),
(22, 453, 'Galo C.', 'Pediatria', 250000),
(17, 521, 'Nino P.', 'Neurologia', 390000),
(45, 522, 'Adams C.', 'Neurologia', 450000),
(18, 585, 'Miller G.', 'Ginecologia', 250000),
(45, 607, 'Niqo P.', 'Pediatria', 240000),
(18, 982, 'Cajal R', 'Cardiologia', 290000);

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
-- Estructura de tabla para la tabla `enfermo`
--

CREATE TABLE `enfermo` (
  `INSCRIPCION` int(11) NOT NULL,
  `APELLIDO` varchar(40) DEFAULT NULL,
  `DIRECCION` varchar(50) DEFAULT NULL,
  `FECHA_NAC` date DEFAULT NULL,
  `SEXO` varchar(1) DEFAULT NULL,
  `NSS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `enfermo`
--

INSERT INTO `enfermo` (`INSCRIPCION`, `APELLIDO`, `DIRECCION`, `FECHA_NAC`, `SEXO`, `NSS`) VALUES
(32, 'Mr enfermito', 'Calle de los enfermitos', '2022-07-06', 'x', 544),
(74835, 'Benitez E.', 'Argentina 5', '1956-10-05', 'M', 154811767),
(36658, 'Domin S.', 'Mayor 71', '1942-01-01', 'M', 160657471),
(63827, 'Ruiz P.', 'Esquerdo 103', '1980-12-26', 'M', 200973253),
(10995, 'Languia M.', 'Goya 20', '1956-05-16', 'M', 280862482),
(18004, 'Serrano V.', 'Alcala 12', '1960-05-21', 'F', 284991452),
(64882, 'Fraser A.', 'Soto 3', '1980-08-19', 'F', 285201776),
(59076, 'Miller G.', 'Lopez de Hoyos 2', '1945-10-10', 'F', 311969044),
(14024, 'Fernandez N.', 'Recoletos', '1967-07-23', 'F', 321790059),
(38702, 'Neal R.', 'Orense 21', '1940-07-18', 'F', 380010217),
(39217, 'Cervantes M.', 'Perón 8', '1952-02-19', 'M', 440294390);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospital`
--

CREATE TABLE `hospital` (
  `HOSPITAL_COD` int(11) NOT NULL,
  `NOMBRE` varchar(40) DEFAULT NULL,
  `DIRECCION` varchar(50) DEFAULT NULL,
  `TELEFONO` varchar(9) DEFAULT NULL,
  `NUM_CAMA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hospital`
--

INSERT INTO `hospital` (`HOSPITAL_COD`, `NOMBRE`, `DIRECCION`, `TELEFONO`, `NUM_CAMA`) VALUES
(0, 'Hospital Vacio', 'wahtever', '6543210', 777),
(17, 'ruber', 'juan bravo 49', '914027100', 217),
(18, 'general', 'Atocha s/n', '595-3111', 987),
(19, 'provincial', 'o donell 50', '964-4264', 502),
(22, 'la paz', 'castellana 1000', '923-5411', 412),
(45, 'san carlos', 'ciudad universitaria', '597-1500', 845);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `HOSPITAL_COD` int(11) DEFAULT NULL,
  `SALA_COD` int(11) DEFAULT NULL,
  `EMPLEADO_NO` int(11) NOT NULL,
  `APELLIDO` varchar(40) DEFAULT NULL,
  `FUNCION` varchar(30) DEFAULT NULL,
  `TURNO` varchar(1) DEFAULT NULL,
  `SALARIO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`HOSPITAL_COD`, `SALA_COD`, `EMPLEADO_NO`, `APELLIDO`, `FUNCION`, `TURNO`, `SALARIO`) VALUES
(22, 6, 1009, 'higueras d.', 'ENFERMERA', 'T', 200500),
(45, 4, 1280, 'amigo r.', 'INTERINO', 'N', 221000),
(19, 6, 3106, 'hernandez j.', 'ENFERMERO', 'T', 275500),
(19, 6, 3754, 'diaz b.', 'ENFERMERO', 'T', 226200),
(22, 1, 6065, 'rivera g.', 'ENFERMERA', 'N', 162600),
(18, 4, 6357, 'karplus w.', 'INTERINO', 'T', 337900),
(22, 1, 7379, 'carlos r.', 'ENFERMERA', 'T', 211900),
(22, 6, 8422, 'bocina g.', 'ENFERMERO', 'M', 163800),
(17, 2, 8519, 'chuko c.', 'ENFERMERO', 'T', 252200),
(17, 6, 8520, 'palomo c.', 'INTERINO', 'M', 219210),
(17, 6, 8521, 'cortes v.', 'ENFERMERA', 'N', 221200),
(45, 1, 8526, 'frank h.', 'ENFERMERO', 'T', 252200),
(22, 2, 9901, 'nuñez c.', 'INTERINO', 'M', 221000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doctor_prueba`
--
ALTER TABLE `doctor_prueba`
  ADD PRIMARY KEY (`DOCTOR_NO`);

--
-- Indices de la tabla `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`EMP_NO`);

--
-- Indices de la tabla `enfermo`
--
ALTER TABLE `enfermo`
  ADD PRIMARY KEY (`NSS`);

--
-- Indices de la tabla `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`HOSPITAL_COD`);

--
-- Indices de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`EMPLEADO_NO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
