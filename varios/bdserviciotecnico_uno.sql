-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 24-10-2018 a las 23:10:32
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdserviciotecnico_uno`
--

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `cscompraproductos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `cscompraproductos` (
`numero_compra` int(11)
,`idcodigo` int(11)
,`referencia` varchar(100)
,`descripcion` varchar(50)
,`tipo` enum('Original','Generico','Otro')
,`marca` varchar(20)
,`valor` int(11)
,`cantidad` int(11)
,`SUBTOTAL` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `csst`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `csst` (
`numero_orden` int(11)
,`id_cliente` int(11)
,`dispositivo` varchar(50)
,`marca` varchar(20)
,`referencia` varchar(20)
,`descripcion_st` varchar(100)
,`observacion` varchar(50)
,`empleado` varchar(10)
,`fecha` date
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `csventaproductos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `csventaproductos` (
`numero_venta` int(11)
,`idcodigo` int(11)
,`referencia` varchar(100)
,`descripcion` varchar(50)
,`tipo` enum('Original','Generico','Otro')
,`marca` varchar(20)
,`valor` int(11)
,`cantidad` int(11)
,`SUBTOTAL` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `detalle` enum('Cliente','Servicio tecnico','Intermediario') NOT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcompra`
--

CREATE TABLE `tbcompra` (
  `numero_compra` int(11) NOT NULL,
  `proveedor` varchar(12) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleado`
--

CREATE TABLE `tbempleado` (
  `idempleado` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `perfil` enum('Administrador','Tecnico','Vendedor') NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmovimiento`
--

CREATE TABLE `tbmovimiento` (
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

CREATE TABLE `tbproducto` (
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

CREATE TABLE `tbproveedor` (
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
-- Estructura de tabla para la tabla `tbservicioentregado`
--

CREATE TABLE `tbservicioentregado` (
  `numero_orden` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `costo` int(11) NOT NULL,
  `tecnico` varchar(50) NOT NULL COMMENT 'persona que reparo el articulo',
  `estado` enum('Reparado','No reparado','Entregado a peticion') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbserviciotecnico`
--

CREATE TABLE `tbserviciotecnico` (
  `numero_orden` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `dispositivo` varchar(50) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `referencia` varchar(20) NOT NULL,
  `descripcion_st` varchar(100) NOT NULL,
  `observacion` varchar(50) DEFAULT NULL,
  `empleado` varchar(10) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbventa`
--

CREATE TABLE `tbventa` (
  `numero_venta` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idempleado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura para la vista `cscompraproductos`
--
DROP TABLE IF EXISTS `cscompraproductos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cscompraproductos`  AS  select `mov`.`idgeneral` AS `numero_compra`,`mov`.`idcodigo` AS `idcodigo`,`pro`.`referencia` AS `referencia`,`pro`.`descripcion` AS `descripcion`,`pro`.`tipo` AS `tipo`,`pro`.`marca` AS `marca`,`mov`.`valor` AS `valor`,`mov`.`cantidad` AS `cantidad`,(`mov`.`valor` * `mov`.`cantidad`) AS `SUBTOTAL` from (`tbproducto` `pro` join `tbmovimiento` `mov` on((`pro`.`idcodigo` = `mov`.`idcodigo`))) where (`mov`.`motivo` = 'Compra') group by `mov`.`idgeneral`,`mov`.`idcodigo`,`pro`.`referencia`,`pro`.`descripcion`,`pro`.`tipo`,`pro`.`marca`,`mov`.`valor`,`mov`.`cantidad` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `csst`
--
DROP TABLE IF EXISTS `csst`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `csst`  AS  select `tbserviciotecnico`.`numero_orden` AS `numero_orden`,`tbserviciotecnico`.`id_cliente` AS `id_cliente`,`tbserviciotecnico`.`dispositivo` AS `dispositivo`,`tbserviciotecnico`.`marca` AS `marca`,`tbserviciotecnico`.`referencia` AS `referencia`,`tbserviciotecnico`.`descripcion_st` AS `descripcion_st`,`tbserviciotecnico`.`observacion` AS `observacion`,`tbserviciotecnico`.`empleado` AS `empleado`,`tbserviciotecnico`.`fecha` AS `fecha` from `tbserviciotecnico` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `csventaproductos`
--
DROP TABLE IF EXISTS `csventaproductos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `csventaproductos`  AS  select `mov`.`idgeneral` AS `numero_venta`,`mov`.`idcodigo` AS `idcodigo`,`pro`.`referencia` AS `referencia`,`pro`.`descripcion` AS `descripcion`,`pro`.`tipo` AS `tipo`,`pro`.`marca` AS `marca`,`mov`.`valor` AS `valor`,`mov`.`cantidad` AS `cantidad`,(`mov`.`valor` * -(`mov`.`cantidad`)) AS `SUBTOTAL` from (`tbproducto` `pro` join `tbmovimiento` `mov` on((`pro`.`idcodigo` = `mov`.`idcodigo`))) where (`mov`.`motivo` = 'Venta') group by `mov`.`idgeneral`,`mov`.`idcodigo`,`pro`.`referencia`,`pro`.`descripcion`,`pro`.`tipo`,`pro`.`marca`,`mov`.`valor`,`mov`.`cantidad` ;

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
  ADD PRIMARY KEY (`numero_compra`),
  ADD KEY `proveedor` (`proveedor`);

--
-- Indices de la tabla `tbempleado`
--
ALTER TABLE `tbempleado`
  ADD PRIMARY KEY (`idempleado`);

--
-- Indices de la tabla `tbmovimiento`
--
ALTER TABLE `tbmovimiento`
  ADD PRIMARY KEY (`idmovimiento`),
  ADD KEY `referencia` (`idcodigo`),
  ADD KEY `idgeneral` (`idgeneral`);

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
-- Indices de la tabla `tbservicioentregado`
--
ALTER TABLE `tbservicioentregado`
  ADD PRIMARY KEY (`numero_orden`);

--
-- Indices de la tabla `tbserviciotecnico`
--
ALTER TABLE `tbserviciotecnico`
  ADD PRIMARY KEY (`numero_orden`),
  ADD KEY `nombre` (`dispositivo`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `empleado` (`empleado`);

--
-- Indices de la tabla `tbventa`
--
ALTER TABLE `tbventa`
  ADD PRIMARY KEY (`numero_venta`),
  ADD KEY `idempleado` (`idempleado`,`idcliente`),
  ADD KEY `idcliente` (`idcliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT de la tabla `tbserviciotecnico`
--
ALTER TABLE `tbserviciotecnico`
  MODIFY `numero_orden` int(11) NOT NULL AUTO_INCREMENT;
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
-- Filtros para la tabla `tbservicioentregado`
--
ALTER TABLE `tbservicioentregado`
  ADD CONSTRAINT `tbservicioentregado_ibfk_1` FOREIGN KEY (`numero_orden`) REFERENCES `tbserviciotecnico` (`numero_orden`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbserviciotecnico`
--
ALTER TABLE `tbserviciotecnico`
  ADD CONSTRAINT `tbserviciotecnico_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbcliente` (`idcliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbserviciotecnico_ibfk_2` FOREIGN KEY (`empleado`) REFERENCES `tbempleado` (`idempleado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbventa`
--
ALTER TABLE `tbventa`
  ADD CONSTRAINT `tbventa_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `tbcliente` (`idcliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbventa_ibfk_2` FOREIGN KEY (`idempleado`) REFERENCES `tbempleado` (`idempleado`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
