<?php

	include 'modelo/mcliente.php';

	$cliente = new Mcliente();

	$idclienteedit   = isset($_POST['idcliente']) ? $_POST['idcliente'] : NULL;
	$nombre      	   = isset($_POST['nombre']) ? $_POST['nombre'] : NULL;
	$detalle         = isset($_POST['detalle']) ? $_POST['detalle'] : NULL;
  $telefono        = isset($_POST['telefono']) ? $_POST['telefono'] : NULL;
	$idclienteeli    = isset($_POST['idclienteeli']) ? $_POST['idclienteeli'] : NULL;
	$actu          	 = isset($_POST['actu']) ? $_POST['actu'] : NULL;
	$idcliente       = isset($_GET['id']) ? $_GET['id'] : NULL;


	/*
		Comprobacion datos para insertar
	*/
	if ($nombre && $detalle && !$actu)
	{
		$cliente->insertar_cliente($nombre, $detalle, $telefono);
	}
    /*
		Comprobacion datos para actualizar
	*/
    if ($idclienteedit && $nombre && $detalle && $actu)
	{
		$cliente->actualizar_cliente($idclienteedit, $nombre, $detalle, $telefono);
	}
	/*
		Comprobar el id para editar ese unico registro
	*/
	if ($idcliente)
	{
		$consultaedit = $cliente->consultar_cliente_id($idcliente);
	}
	/*
		Eliminar el registro
	*/
	if ($idclienteeli)
	{
		$cliente->eliminar_cliente($idclienteeli);
	}
