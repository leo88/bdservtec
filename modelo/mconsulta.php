<?php

	/*  
        *   @Version: V1.2 16/08/16
    */

	include 'controlador/conexion.php';
	include 'functions.php';

	class Mconsulta extends Funciones
	{
		public function __construct()
		{

		}
		/*
		 *función para la consulta de los datos de la consulta existencia
		 */
		function consultarExistencia()
		{

			$sql = "SELECT tbproducto.idcodigo AS idcodigo,tbproducto.referencia AS referencia,tbproducto.descripcion AS descripcion,tbproducto.tipo AS tipo,tbproducto.marca AS marca,tbproducto.ubicacion AS ubicacion,sum(tbmovimiento.cantidad) AS SumaDecantidad,tbproducto.precio AS precio from (tbproducto join tbmovimiento on((tbproducto.idcodigo = tbmovimiento.idcodigo))) group by tbproducto.idcodigo,tbproducto.referencia,tbproducto.descripcion,tbproducto.tipo,tbproducto.marca,tbproducto.precio,tbproducto.ubicacion";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la compra con su valor total
		 */
		function consultarCompraTotal()
		{
			$sql = "SELECT cscom.numero_compra, com.fecha,com.proveedor,pro.nombre,pro.telefono,sum(cscom.SUBTOTAL) as total from tbcompra as com INNER JOIN tbproveedor as pro ON pro.idproveedor = com.proveedor JOIN cscompraproductos as cscom ON com.numero_compra = cscom.numero_compra GROUP BY cscom.numero_compra, com.fecha";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta compra por productos
		 */
		function consultarCompra()
		{
			$sql = "SELECT * FROM cscompraproductos";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la compra con su valor total
		 */
		function consultarVentaTotal()
		{
			$sql = "SELECT csven.numero_venta,ven.fecha,ven.idcliente,cl.nombre AS cliente,ven.idempleado,emp.nombre AS empleado,sum(csven.SUBTOTAL) as total from tbventa as ven INNER JOIN tbcliente as cl ON cl.idcliente = ven.idcliente INNER JOIN tbempleado as emp ON emp.idempleado = ven.idempleado JOIN csventaproductos as csven ON ven.numero_venta = csven.numero_venta GROUP BY csven.numero_venta, ven.fecha";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta compra por productos
		 */
		function consultarVenta()
		{
			$sql = "SELECT * FROM csventaproductos";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la tbventa productos
		 */
		function consultar_ventaproducto_id($idventa)
		{
			$sql = "SELECT * FROM csventaproductos WHERE numero_venta = '$idventa'";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la tbventa total
		 */
		function consultar_ventatotal_id($idventa)
		{
			$sql = "SELECT * FROM csventatotal WHERE numero_venta = '$idventa'";
			return $this->SeleccionDatos($sql);
		}
	}