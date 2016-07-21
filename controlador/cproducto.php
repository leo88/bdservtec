<?php

	/*
		*	version: 1.0 21/07/2016
	*/

	include 'modelo/mproducto.php';

	$producto = new Mproducto();

	$idcodedit   		= isset($_POST['idcod']) ? $_POST['idcod'] : NULL;
	$referencia     = isset($_POST['referencia']) ? $_POST['referencia'] : NULL;
  $descripcion    = isset($_POST['descripcion']) ? $_POST['descripcion'] : NULL;
  $tipo    				= isset($_POST['tipo']) ? $_POST['tipo'] : NULL;
  $marca    			= isset($_POST['marca']) ? $_POST['marca'] : NULL;
	$precio       	= isset($_POST['precio']) ? $_POST['precio'] : NULL;
  $ubicacion    	= isset($_POST['ubicacion']) ? $_POST['ubicacion'] : NULL;
	$idcodigoeli    = isset($_POST['idcodigoeli']) ? $_POST['idcodigoeli'] : NULL;
	$actu          	= isset($_POST['actu']) ? $_POST['actu'] : NULL;
	$idcodigo      	= isset($_GET['id']) ? $_GET['id'] : NULL;

	/*
		Variables para aplicar el formato de Mayusculas y minusculas
	*/
	$newBrand = $producto->sentence_case_test($marca);

	/*
		Comprobacion datos para insertar
	*/
	if ($referencia && $descripcion && $tipo && $marca && $precio && $ubicacion && !$actu)
	{

		$producto->insertar_producto($referencia,$descripcion,$tipo,$newBrand,$precio,$ubicacion);
	}
	/*
		Comprobacion datos para actualizar
	*/
	if ($idcodedit && $referencia && $descripcion && $tipo && $marca && $precio && $ubicacion && $actu)
	{
		$producto->actualizar_producto($idcodedit,$referencia,$descripcion,$tipo,$newBrand,$precio,$ubicacion);
	}
	/*
		Comprobar el id para editar ese unico registro
	*/
	if ($idcodigo)
	{
		$consultaedit = $producto->consultar_producto_id($idcodigo);
	}
	/*
		Eliminar el registro
	*/
	if ($idcodigoeli)
	{
		$producto->eliminar_producto($idcodigoli);
	}
