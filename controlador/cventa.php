<?php
	
	include('modelo/mventa.php');

	$venta = new Mventa();

	$idventaedit 	 = isset($_POST['numero_venta']) ? $_POST['numero_venta'] : NULL;	
	$fechasalida     = isset($_POST['fechasalida']) ? $_POST['fechasalida'] : NULL;
	$idcomprador     = isset($_POST['idcomprador']) ? $_POST['idcomprador'] : NULL;
	$idvendedor      = isset($_POST['idvendedor']) ? $_POST['idvendedor'] : NULL;
    $total           = isset($_POST['total']) ? $_POST['total'] : NULL;
	//$idventaeli 	 = isset($_POST['idventaeli']) ? $_POST['idventaeli'] : NULL;
	$actu            = isset($_POST['actu']) ? $_POST['actu'] : NULL;
	$numero_venta    = isset($_GET['id']) ? $_GET['id'] : NULL;	

	/*
		Variables para traer los datos de los desplegables
	*/
	$idcomprador2	= $venta->sel_idcomprador();
	$idvendedor2	= $venta->sel_idvendedor();

	/*
		Comprobacion datos para insertar
	*/
	if ($fechasalida && $idcomprador && $idvendedor && !$actu) 
	{
        
		$venta->insertar_venta($fechasalida, $idcomprador, $idvendedor, $total);
	}
	/*
		Comprobacion datos para actualizar
	*/
	if ($idventaedit && $fechasalida && $idcomprador && $idvendedor && $actu) 
	{
		$venta->actualizar_venta($idventaedit, $fechasalida, $idcomprador, $idvendedor, $total);
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