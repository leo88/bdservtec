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
		 *función para la consulta de los datos de la consulta compra total
		 */
		function consultar_compratotal()
		{
			$sql = "SELECT * FROM cscompratotal";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta reposicion
		 */
		function consultar_reposicion()
		{
			$sql = "SELECT * FROM csreposicion";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta compra dia total
		 */
		function consultar_diacompratotal()
		{
			$sql = "SELECT * FROM csdiatotalcompra";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta otros por dia
		 */
		function consultar_diatotalotros()
		{
			$sql = "SELECT * FROM csdiatotalotros";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta servico tecnico por dia
		 */
		function consultar_diatotalst()
		{
			$sql = "SELECT * FROM csdiatotalst";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta servico tecnico entregado por dia
		 */
		function consultar_diatotalstentreg()
		{
			$sql = "SELECT * FROM csdiatotalstentreg";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta servico tecnico por mes
		 */
		function consultar_mestotalst()
		{
			$sql = "SELECT * FROM csmestotalst";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta servico tecnico entregado por mes
		 */
		function consultar_mestotalstentreg()
		{
			$sql = "SELECT * FROM csmestotalstentreg";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta ventas por dia
		 */
		function consultar_diatotalventas()
		{
			$sql = "SELECT * FROM csdiatotalventas";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta entradas por mes
		 */
		function consultar_mestotalentra()
		{
			$sql = "SELECT * FROM csmestotalentra";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta otros por mes
		 */
		function consultar_mestotalotros()
		{
			$sql = "SELECT * FROM csmestotalotros";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta salidas por mes
		 */
		function consultar_mestotalsale()
		{
			$sql = "SELECT * FROM csmestotalsale";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta ventas por mes
		 */
		function consultar_mestotalventas()
		{
			$sql = "SELECT * FROM csmestotalventas";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta entradas por dia
		 */
		function consultar_totalentradia()
		{
			$sql = "SELECT * FROM cstotalentradia";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta salidas por dia
		 */
		function consultar_totalsaledia()
		{
			$sql = "SELECT * FROM cstotalsaledia";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta venta
		 */
		function consultar_venta()
		{
			$sql = "SELECT * FROM csventa";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta venta por producto
		 */
		function consultar_ventaproducto()
		{
			$sql = "SELECT * FROM csventaproductos";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta venta total
		 */
		function consultar_ventatotal()
		{
			$sql = "SELECT * FROM csventatotal";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta Utilidad por dia
		 */
		function consultar_utilidadtotaldia()
		{
			$sql = "SELECT * FROM csutilidadtotaldia";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la consulta Utilidad por mes
		 */
		function consultar_utilidadtotalmes()
		{
			$sql = "SELECT * FROM csutilidadtotalmes";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la tbventa
		 */
		function consultar_venta_id()
		{
			$sql = "SELECT * FROM csventa ORDER BY numero_venta desc limit 1";
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
		/*
		 *función para la consulta de los datos Servicio tecnico y st entregado
		 */
		function consultar_stcomparativo()
		{
			$sql = "SELECT st.numero_orden, st.nombre,st.marca,st.referencia, st.descripcion_st,st.observacion,st.precio_cliente,st.fecha,cl.nombre,emp.nombre, st.abono,(st.precio_cliente - st.abono) AS `saldo_pendiente`, sten.fecha AS fecha_cancel, sten.saldo_cancel AS saldo_cancelado from tbserviciotecnico as st INNER JOIN tbcliente as cl ON cl.idcliente = st.id_cliente INNER JOIN tbempleado as emp ON emp.idempleado = st.empleado LEFT JOIN tbservicioentregado as sten ON st.numero_orden = sten.numero_orden";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la tbservicio tecnico
		 */
		function consultar_st_id()
		{
			$sql = "SELECT * FROM csst ORDER BY numero_orden desc limit 1";
			return $this->SeleccionDatos($sql);
		}
		/*
		 *función para la consulta de los datos de la tbreposicion
		 */
		function consultar_rep()
		{
			$sql = "SELECT * FROM tbreposicion ORDER BY idreposicion";
			return $this->SeleccionDatos($sql);
		}
        /*
		 *función para la consulta de los datos de cantidad ventas por cliente
		 */
		function consultar_top_cliente()
		{
			$sql = "SELECT tbcliente.nombre AS nombre, Count(tbventa.idcliente) AS no_ventas
            FROM tbcliente INNER JOIN tbventa ON tbcliente.idcliente = tbventa.idcliente
            GROUP BY tbcliente.nombre";
			return $this->SeleccionDatos($sql);
		}
        /*
		 *función para la consulta de los datos de cantidad ventas por vendedor
		 */
		function consultar_top_vendedor()
		{
			$sql = "SELECT tbempleado.nombre AS nombre, Count(tbventa.idempleado) AS no_ventas
            FROM tbempleado INNER JOIN tbventa ON tbempleado.idempleado = tbventa.idempleado
            GROUP BY tbempleado.nombre";
			return $this->SeleccionDatos($sql);
		}
	}