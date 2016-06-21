-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2016 a las 17:30:08
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbcomprador`
--

INSERT INTO `tbcomprador` (`idcomprador`, `nombre`, `detalle`) VALUES
(1, 'Dario Sanchez', 'Cliente');

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
  `subtotal` int(11) NOT NULL COMMENT 'cantidad por costo',
  `precio` int(11) NOT NULL COMMENT 'valor sugerido de venta',
  `ubicacion` varchar(60) NOT NULL COMMENT 'donde se encuentra el producto'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbproducto`
--

INSERT INTO `tbproducto` (`idcodigo`, `idproveedor`, `fechaingreso`, `referencia`, `descripcion`, `tipo`, `marca`, `cantidad`, `costo`, `subtotal`, `precio`, `ubicacion`) VALUES
(1, 12345, '2016-06-20', 'sk - 300 mini', 'display', 'Original', 'sony', 12, 8000, 96000, 10000, 'estante 4');

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

--
-- Volcado de datos para la tabla `tbproveedor`
--

INSERT INTO `tbproveedor` (`idproveedor`, `nombre`, `contacto`, `telefono`, `telefono2`, `direccion`, `email`) VALUES
(12345, 'Tecnoinsumos', 'Diana Parez', '8675234', '3126548709', 'Cra 5 # 23', 'tecnoinsumos@email.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsalida`
--

CREATE TABLE IF NOT EXISTS `tbsalida` (
  `idventa` int(11) NOT NULL,
  `idcodigo` int(11) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbsalida`
--

INSERT INTO `tbsalida` (`idventa`, `idcodigo`, `referencia`, `descripcion`, `marca`, `tipo`, `precio`, `cantidad`, `subtotal`) VALUES
(1, 1, 'sk - 300 mini', 'display', 'sony', 'original', 10000, 2, 20000);

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

--
-- Volcado de datos para la tabla `tbvendedor`
--

INSERT INTO `tbvendedor` (`idvendedor`, `nombre`, `direccion`, `telefono`, `email`, `estado`) VALUES
(54321, 'Wilson Diaz', 'Cra 7 # 19-14', '3126478524', 'wilson@email.com', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbventa`
--

CREATE TABLE IF NOT EXISTS `tbventa` (
  `idventa` int(11) NOT NULL,
  `fechasalida` date NOT NULL,
  `idvendedor` int(11) NOT NULL,
  `idcomprador` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbventa`
--

INSERT INTO `tbventa` (`idventa`, `fechasalida`, `idvendedor`, `idcomprador`) VALUES
(1, '2016-06-21', 54321, 1);

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
  ADD PRIMARY KEY (`idcodigo`) COMMENT 'Codigo de barras', ADD KEY `idproveedor` (`idproveedor`);

--
-- Indices de la tabla `tbproveedor`
--
ALTER TABLE `tbproveedor`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `tbsalida`
--
ALTER TABLE `tbsalida`
  ADD PRIMARY KEY (`idventa`,`idcodigo`), ADD KEY `idcodigo` (`idcodigo`);

--
-- Indices de la tabla `tbvendedor`
--
ALTER TABLE `tbvendedor`
  ADD PRIMARY KEY (`idvendedor`);

--
-- Indices de la tabla `tbventa`
--
ALTER TABLE `tbventa`
  ADD PRIMARY KEY (`idventa`), ADD KEY `idvendedor` (`idvendedor`), ADD KEY `idcomprador` (`idcomprador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbcomprador`
--
ALTER TABLE `tbcomprador`
  MODIFY `idcomprador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbproducto`
--
ALTER TABLE `tbproducto`
  MODIFY `idcodigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de barras',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbventa`
--
ALTER TABLE `tbventa`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbproveedor`
--
ALTER TABLE `tbproveedor`
ADD CONSTRAINT `tbproveedor_ibfk_1` FOREIGN KEY (`idproveedor`) REFERENCES `tbproducto` (`idproveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbsalida`
--
ALTER TABLE `tbsalida`
ADD CONSTRAINT `tbsalida_ibfk_1` FOREIGN KEY (`idcodigo`) REFERENCES `tbproducto` (`idcodigo`) ON UPDATE CASCADE,
ADD CONSTRAINT `tbsalida_ibfk_2` FOREIGN KEY (`idventa`) REFERENCES `tbventa` (`idventa`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbventa`
--
ALTER TABLE `tbventa`
ADD CONSTRAINT `tbventa_ibfk_2` FOREIGN KEY (`idcomprador`) REFERENCES `tbcomprador` (`idcomprador`) ON UPDATE CASCADE,
ADD CONSTRAINT `tbventa_ibfk_3` FOREIGN KEY (`idvendedor`) REFERENCES `tbvendedor` (`idvendedor`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
