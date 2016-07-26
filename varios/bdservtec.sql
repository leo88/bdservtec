-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2016 a las 16:55:26
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdservtec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcliente`
--

CREATE TABLE IF NOT EXISTS `tbcliente` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `detalle` enum('Cliente','Servicio tecnico','Intermediario') NOT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbcliente`
--

INSERT INTO `tbcliente` (`idcliente`, `nombre`, `detalle`, `telefono`) VALUES
(1, 'Anonimo', 'Cliente', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcompra`
--

CREATE TABLE IF NOT EXISTS `tbcompra` (
  `numero_compra` int(11) NOT NULL,
  `proveedor` varchar(12) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleado`
--

CREATE TABLE IF NOT EXISTS `tbempleado` (
  `idempleado` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmovimiento`
--

CREATE TABLE IF NOT EXISTS `tbmovimiento` (
  `idmovimiento` int(11) NOT NULL,
  `idgeneral` int(11) NOT NULL,
  `motivo` varchar(30) NOT NULL,
  `idcodigo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproducto`
--

CREATE TABLE IF NOT EXISTS `tbproducto` (
  `idcodigo` int(11) NOT NULL COMMENT 'Codigo de barras',
  `referencia` varchar(100) NOT NULL COMMENT 'puede ir referencia y modelo',
  `descripcion` varchar(50) NOT NULL COMMENT 'que es el elemento',
  `tipo` enum('Original','Generico','Otro') NOT NULL,
  `marca` varchar(20) NOT NULL,
  `precio` int(11) NOT NULL,
  `ubicacion` varchar(60) NOT NULL COMMENT 'ubicacion del estante'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproveedor`
--

CREATE TABLE IF NOT EXISTS `tbproveedor` (
  `idproveedor` varchar(12) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `telefono2` varchar(20) DEFAULT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuario`
--

CREATE TABLE IF NOT EXISTS `tbusuario` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipo_user` enum('Administrador','Vendedor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbusuario`
--

INSERT INTO `tbusuario` (`username`, `password`, `tipo_user`) VALUES
('Administrador', '2793e6065e148464014eac1d0d21afa49ba36812', 'Administrador'),
('vendedor', '88d6818710e371b461efff33d271e0d2fb6ccf47', 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbventa`
--

CREATE TABLE IF NOT EXISTS `tbventa` (
  `numero_venta` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idempleado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `tbcompra`
--
ALTER TABLE `tbcompra`
  ADD PRIMARY KEY (`numero_compra`), ADD KEY `proveedor` (`proveedor`);

--
-- Indices de la tabla `tbempleado`
--
ALTER TABLE `tbempleado`
  ADD PRIMARY KEY (`idempleado`);

--
-- Indices de la tabla `tbmovimiento`
--
ALTER TABLE `tbmovimiento`
  ADD PRIMARY KEY (`idmovimiento`), ADD KEY `referencia` (`idcodigo`), ADD KEY `idgeneral` (`idgeneral`);

--
-- Indices de la tabla `tbproducto`
--
ALTER TABLE `tbproducto`
  ADD PRIMARY KEY (`idcodigo`);

--
-- Indices de la tabla `tbproveedor`
--
ALTER TABLE `tbproveedor`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `tbventa`
--
ALTER TABLE `tbventa`
  ADD PRIMARY KEY (`numero_venta`), ADD KEY `idempleado` (`idempleado`,`idcliente`), ADD KEY `idcliente` (`idcliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbcompra`
--
ALTER TABLE `tbcompra`
  MODIFY `numero_compra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbmovimiento`
--
ALTER TABLE `tbmovimiento`
  MODIFY `idmovimiento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbproducto`
--
ALTER TABLE `tbproducto`
  MODIFY `idcodigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de barras';
--
-- AUTO_INCREMENT de la tabla `tbventa`
--
ALTER TABLE `tbventa`
  MODIFY `numero_venta` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbcompra`
--
ALTER TABLE `tbcompra`
ADD CONSTRAINT `tbcompra_ibfk_1` FOREIGN KEY (`proveedor`) REFERENCES `tbproveedor` (`idproveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbmovimiento`
--
ALTER TABLE `tbmovimiento`
ADD CONSTRAINT `tbmovimiento_ibfk_1` FOREIGN KEY (`idcodigo`) REFERENCES `tbproducto` (`idcodigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbventa`
--
ALTER TABLE `tbventa`
ADD CONSTRAINT `tbventa_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `tbcliente` (`idcliente`) ON UPDATE CASCADE,
ADD CONSTRAINT `tbventa_ibfk_2` FOREIGN KEY (`idempleado`) REFERENCES `tbempleado` (`idempleado`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
