<?php
	
	include('modelo/mcomprador.php');

	$comprador = new Mcomprador();

	$idcompradoredit   = isset($_POST['idcomprador']) ? $_POST['idcomprador'] : NULL;
	$nombre      	   = isset($_POST['nombre']) ? $_POST['nombre'] : NULL;
	$detalle           = isset($_POST['detalle']) ? $_POST['detalle'] : NULL;
    $telefono          = isset($_POST['telefono']) ? $_POST['telefono'] : NULL;
	$idcompradoreli    = isset($_POST['idcompradoreli']) ? $_POST['idcompradoreli'] : NULL;
	$actu          	   = isset($_POST['actu']) ? $_POST['actu'] : NULL;
	$idcomprador       = isset($_GET['id']) ? $_GET['id'] : NULL;	

	
	/*
		Comprobacion datos para insertar
	*/
	if ($nombre && $detalle && !$actu) 
	{
		$comprador->insertar_comprador($nombre, $detalle, $telefono);
	}
    /*
		Comprobacion datos para actualizar
	*/
    if ($idcompradoredit && $nombre && $detalle && $actu) 
	{
		$comprador->actualizar_comprador($idcompradoredit, $nombre, $detalle, $telefono);
	}
	/*
		Comprobar el id para editar ese unico registro
	*/
	if ($idcomprador) 
	{
		$consultaedit = $comprador->consultar_comprador_id($idcomprador);
	}
	/*
		Eliminar el registro 
	*/
	if ($idcompradoreli) 
	{
		$comprador->eliminar_comprador($idcompradoreli);
	}