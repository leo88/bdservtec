<?php
	
	include('modelo/mproveedor.php');

	$proveedor = new Mproveedor();

	$idproveedit   = isset($_POST['idprovee']) ? $_POST['idprovee'] : NULL;
	$idproveedor   = isset($_POST['idproveedor']) ? $_POST['idproveedor'] : NULL;
	$nombre        = isset($_POST['nombre']) ? $_POST['nombre'] : NULL;
	$contacto      = isset($_POST['contacto']) ? $_POST['contacto'] : NULL;
    $telefono      = isset($_POST['telefono']) ? $_POST['telefono'] : NULL;
    $telefono2     = isset($_POST['telefono2']) ? $_POST['telefono2'] : NULL;
    $email         = isset($_POST['email']) ? $_POST['email'] : NULL;
    $descripcion   = isset($_POST['descripcion']) ? $_POST['descripcion'] : NULL;
	$idproveeli    = isset($_POST['idproveeli']) ? $_POST['idproveeli'] : NULL;
	$actu          = isset($_POST['actu']) ? $_POST['actu'] : NULL;
	$idprovee      = isset($_GET['id']) ? $_GET['id'] : NULL;	

	/*
		Variables para aplicar el formato de Mayusculas y minusculas
	*/
	$newName = $proveedor->sentence_case($nombre);
	$newContac = $proveedor->sentence_case($contacto);

	/*
		Comprobacion datos para insertar
	*/
	if ($idproveedor&& $nombre && $descripcion && !$actu) 
	{
        
		$proveedor->insertar_proveedor($idproveedor,$newName,$newContac,$telefono,$telefono2,$email,$descripcion);
	}
	/*
		Comprobacion datos para actualizar
	*/
	if ($idproveedit && $nombre && $descripcion && $actu) 
	{
		$proveedor->actualizar_proveedor($idproveedit,$newName,$newContac,$telefono,$telefono2,$email,$descripcion);
	}
	/*
		Comprobar el id para editar ese unico registro
	*/
	if ($idprovee) 
	{
		$consultaedit = $proveedor->consultar_proveedor_id($idprovee);
	}
	/*
		Eliminar el registro 
	*/
	if ($idproveeli) 
	{
		$proveedor->eliminar_proveedor($idproveeli);
	}
