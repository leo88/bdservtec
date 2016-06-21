-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2016 a las 19:01:10
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdserviciotecnico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcomprador`
--

CREATE TABLE IF NOT EXISTS `tbcomprador` (
  `idcomprador` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `detalle` enum('Cliente','Servicio tecnico','Intermediario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproducto`
--

CREATE TABLE IF NOT EXISTS `tbproducto` (
  `idcodigo` int(11) NOT NULL COMMENT 'Codigo de barras',
  `idproveedor` int(11) NOT NULL COMMENT 'id de la tbproveedor',
  `fechaingreso` date NOT NULL,
  `referencia` varchar(100) NOT NULL COMMENT 'Puede ir referencia y modelo',
  `descripcion` varchar(100) NOT NULL COMMENT 'cual es el producto',
  `tipo` enum('Original','Generico','Otro') NOT NULL COMMENT 'generico u original etc',
  `marca` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` int(11) NOT NULL COMMENT 'valor unitario al que se compro',
  `precio` int(11) NOT NULL COMMENT 'valor sugerido de venta',
  `ubicacion` varchar(60) NOT NULL COMMENT 'donde se encuentra el producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproveedor`
--

CREATE TABLE IF NOT EXISTS `tbproveedor` (
  `idproveedor` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `telefono2` varchar(20) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsalida`
--

CREATE TABLE IF NOT EXISTS `tbsalida` (
  `idventa` int(11) NOT NULL,
  `idcodigo` int(11) NOT NULL,
  `referencia` int(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `marca` int(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbvendedor`
--

CREATE TABLE IF NOT EXISTS `tbvendedor` (
  `idvendedor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbventa`
--

CREATE TABLE IF NOT EXISTS `tbventa` (
  `idventa` int(11) NOT NULL,
  `fechasalida` date NOT NULL,
  `idvendedor` int(11) NOT NULL,
  `idcomprador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbcomprador`
--
ALTER TABLE `tbcomprador`
  ADD PRIMARY KEY (`idcomprador`);

--
-- Indices de la tabla `tbproducto`
--
ALTER TABLE `tbproducto`
  ADD PRIMARY KEY (`idcodigo`) COMMENT 'Codigo de barras';

--
-- Indices de la tabla `tbproveedor`
--
ALTER TABLE `tbproveedor`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `tbsalida`
--
ALTER TABLE `tbsalida`
  ADD PRIMARY KEY (`idventa`,`idcodigo`);

--
-- Indices de la tabla `tbvendedor`
--
ALTER TABLE `tbvendedor`
  ADD PRIMARY KEY (`idvendedor`);

--
-- Indices de la tabla `tbventa`
--
ALTER TABLE `tbventa`
  ADD PRIMARY KEY (`idventa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbcomprador`
--
ALTER TABLE `tbcomprador`
  MODIFY `idcomprador` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbproducto`
--
ALTER TABLE `tbproducto`
  MODIFY `idcodigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de barras';
--
-- AUTO_INCREMENT de la tabla `tbproveedor`
--
ALTER TABLE `tbproveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbvendedor`
--
ALTER TABLE `tbvendedor`
  MODIFY `idvendedor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbventa`
--
ALTER TABLE `tbventa`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
