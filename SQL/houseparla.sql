-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2022 a las 08:54:07
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
-- Base de datos: `houseparla`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chalet`
--

CREATE TABLE `chalet` (
  `MOD_CHALET` varchar(20) NOT NULL,
  `FINALIZACION_CONSTR` date DEFAULT NULL,
  `PRECIO` int(11) DEFAULT NULL,
  `PRECIO_IVA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `COD_CLIENTE` int(11) NOT NULL,
  `APELLIDOS` varchar(20) DEFAULT NULL,
  `NOMBRE` varchar(20) DEFAULT NULL,
  `DNI` varchar(8) DEFAULT NULL,
  `TEL1` int(11) DEFAULT NULL,
  `TEL2` int(11) DEFAULT NULL,
  `DIR` varchar(30) DEFAULT NULL,
  `POBLACION` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pisos`
--

CREATE TABLE `pisos` (
  `MOD_PISO` varchar(20) NOT NULL,
  `FINALIZACION_CONSTR` date DEFAULT NULL,
  `PRECIO` int(11) DEFAULT NULL,
  `PRECIO_IVA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventachalets`
--

CREATE TABLE `ventachalets` (
  `COD_CLIENTE` int(11) DEFAULT NULL,
  `FECHA_VENTA` date DEFAULT NULL,
  `MOD_CHALET` varchar(20) DEFAULT NULL,
  `COD_CHALET` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventapisos`
--

CREATE TABLE `ventapisos` (
  `COD_CLIENTE` int(11) DEFAULT NULL,
  `FECHA_VENTA` date DEFAULT NULL,
  `MOD_PISO` varchar(20) DEFAULT NULL,
  `COD_PISO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chalet`
--
ALTER TABLE `chalet`
  ADD PRIMARY KEY (`MOD_CHALET`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`COD_CLIENTE`);

--
-- Indices de la tabla `pisos`
--
ALTER TABLE `pisos`
  ADD PRIMARY KEY (`MOD_PISO`);

--
-- Indices de la tabla `ventachalets`
--
ALTER TABLE `ventachalets`
  ADD PRIMARY KEY (`COD_CHALET`),
  ADD KEY `COD_CLIENTE` (`COD_CLIENTE`),
  ADD KEY `MOD_CHALET` (`MOD_CHALET`);

--
-- Indices de la tabla `ventapisos`
--
ALTER TABLE `ventapisos`
  ADD PRIMARY KEY (`COD_PISO`),
  ADD KEY `COD_CLIENTE` (`COD_CLIENTE`),
  ADD KEY `MOD_PISO` (`MOD_PISO`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventachalets`
--
ALTER TABLE `ventachalets`
  ADD CONSTRAINT `ventachalets_ibfk_1` FOREIGN KEY (`COD_CLIENTE`) REFERENCES `clientes` (`COD_CLIENTE`),
  ADD CONSTRAINT `ventachalets_ibfk_2` FOREIGN KEY (`MOD_CHALET`) REFERENCES `chalet` (`MOD_CHALET`);

--
-- Filtros para la tabla `ventapisos`
--
ALTER TABLE `ventapisos`
  ADD CONSTRAINT `ventapisos_ibfk_1` FOREIGN KEY (`COD_CLIENTE`) REFERENCES `clientes` (`COD_CLIENTE`),
  ADD CONSTRAINT `ventapisos_ibfk_2` FOREIGN KEY (`MOD_PISO`) REFERENCES `pisos` (`MOD_PISO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
