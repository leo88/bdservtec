<?php

	include 'modelo/mempleado.php';

	$empleado = new Mempleado();

	$idempleedit   = isset($_POST['idemple']) ? $_POST['idemple'] : NULL;
	$idempleado    = isset($_POST['idempleado']) ? $_POST['idempleado'] : NULL;
	$nombre        = isset($_POST['nombre']) ? $_POST['nombre'] : NULL;
  	$direccion     = isset($_POST['direccion']) ? $_POST['direccion'] : NULL;
  	$telefono	   = isset($_POST['telefono']) ? $_POST['telefono'] : NULL;
  	$email         = isset($_POST['email']) ? $_POST['email'] : NULL;
  	$estado        = isset($_POST['estado']) ? $_POST['estado'] : NULL;
	$idempleeli    = isset($_POST['idempleeli ']) ? $_POST['idempleeli '] : NULL;
	$actu          = isset($_POST['actu']) ? $_POST['actu'] : NULL;
	$idemple       = isset($_GET['id']) ? $_GET['id'] : NULL;

	/*
		Variables para aplicar el formato de Mayusculas y minusculas
	*/
	$mayusNombre 	= $empleado->cambiarMayusculas($nombre);
	$mayusDireccion = $empleado->cambiarMayusculas($direccion);
	/*
		Comprobacion datos para insertar
	*/
	if ($idempleado && $nombre && $direccion && $telefono && $estado && !$actu)
	{
		$empleado->insertar_empleado($idempleado,$mayusNombre,$mayusDireccion,$telefono,$email,$estado);
	}
	/*
		Comprobacion datos para actualizar
	*/
	if ($idempleedit && $nombre && $actu)
	{
		$empleado->actualizar_empleado($idempleedit,$mayusNombre,$mayusDireccion,$telefono,$email,$estado);
	}
	/*
		Comprobar el id para editar ese unico registro
	*/
	if ($idemple)
	{
		$consultaedit = $empleado->consultar_empleado_id($idemple);
	}
	/*
		Eliminar el registro
	*/
	if ($idempleeli)
	{
		$empleado->eliminar_empleado($idempleeli);
	}
