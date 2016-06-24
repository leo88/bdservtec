<?php
	
	include('modelo/mproducto.php');

	$producto = new Mproducto();

	$idcodedit   		= isset($_POST['idcod']) ? $_POST['idcod'] : NULL;
	$idproveedor        = isset($_POST['idproveedor']) ? $_POST['idproveedor'] : NULL;
	$fechaingreso      	= date('Y-m-d');
    $referencia      	= isset($_POST['referencia']) ? $_POST['referencia'] : NULL;
    $descripcion     	= isset($_POST['descripcion']) ? $_POST['descripcion'] : NULL;
    $tipo    			= isset($_POST['tipo']) ? $_POST['tipo'] : NULL;
    $marca    			= isset($_POST['marca']) ? $_POST['marca'] : NULL;
	$cantidad        	= isset($_POST['cantidad']) ? $_POST['cantidad'] : NULL;
	$costo      		= isset($_POST['costo']) ? $_POST['costo'] : NULL;
    $subtotal      		= isset($_POST['subtotal']) ? $_POST['subtotal'] : NULL;
    $precio     		= isset($_POST['precio']) ? $_POST['precio'] : NULL;
    $ubicacion    		= isset($_POST['ubicacion']) ? $_POST['ubicacion'] : NULL;
	$idcodigoeli    	= isset($_POST['idcodigoeli']) ? $_POST['idcodigoeli'] : NULL;
	$actu          		= isset($_POST['actu']) ? $_POST['actu'] : NULL;
	$idcodigo      		= isset($_GET['id']) ? $_GET['id'] : NULL;	

	/*
		Variables para aplicar el formato de Mayusculas y minusculas
	*/
	$newBrand = $producto->sentence_case_test($marca);

	/*
		Variables para traer los datos de los desplegables
	*/
	$proveedor2	= $producto->sel_proveedor();

	/*
		Comprobacion datos para insertar
	*/
	if ($idproveedor && $fechaingreso && $referencia && $descripcion && $tipo && $marca && $cantidad && $costo && $subtotal && $precio && $ubicacion && !$actu) 
	{
        
		$producto->insertar_producto($idproveedor,$fechaingreso,$referencia,$descripcion,$tipo,$newBrand,$cantidad,$costo,$subtotal,$precio,$ubicacion);
	}
	/*
		Comprobacion datos para actualizar
	*/
	if ($idcodedit && $idproveedor && $fechaingreso && $referencia && $descripcion && $tipo && $marca && $cantidad && $costo && $subtotal && $precio && $ubicacion && $actu) 
	{
		$producto->actualizar_producto($idcodedit,$idproveedor,$fechaingreso,$referencia,$descripcion,$tipo,$newBrand,$cantidad,$costo,$subtotal,$precio,$ubicacion);
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