<?php
	
	/*
		*	version: 1.1 26/07/2016
	*/

	include 'modelo/mventa.php';

	$venta = new Mventa();

	$idventaedit 	= isset($_POST['numero_venta']) ? $_POST['numero_venta'] : NULL;
	$cliente      = isset($_POST['cliente']) ? $_POST['cliente'] : NULL;
	$fecha          = isset($_POST['fecha']) ? $_POST['fecha'] : NULL;
	$empleado     = isset($_POST['empleado']) ? $_POST['empleado'] : NULL;
	//$idventaeli 	= isset($_POST['idventaeli']) ? $_POST['idventaeli'] : NULL;
	$actu           = isset($_POST['actu']) ? $_POST['actu'] : NULL;
	$numero_venta   = isset($_GET['id']) ? $_GET['id'] : NULL;	

	/*
		Variables para traer los datos de los desplegables
	*/
	$empleado2	= $venta->sel_empleado();
	$cliente2	= $venta->sel_cliente();

	/*
		Comprobacion datos para insertar
	*/
	if ($cliente && $fecha && $empleado && !$actu) 
	{
        
		$venta->insertar_venta($cliente, $fecha, $empleado);
	}
	/*
		Comprobacion datos para actualizar
	*/
	if ($idventaedit && $cliente && $fecha && $empleado && $actu) 
	{
		$venta->actualizar_venta($idventaedit, $cliente, $fecha, $empleado);
	}
	/*
		Comprobar el id para editar ese unico registro
	*/
	if ($numero_venta) 
	{
		$consultaedit = $venta->consultar_venta_id($numero_venta);
	}
	/*
		Eliminar el registro 
	*/
	/*if ($idventaeli) 
	{
		$venta->eliminar_venta($idventaeli);
	}
	*/