<?php
	
	include('modelo/mvendedor.php');

	$vendedor = new Mvendedor();

	$idvendedoredit   	= isset($_POST['idvende']) ? $_POST['idvende'] : NULL;
	$idvendedor    		= isset($_POST['idvendedor']) ? $_POST['idvendedor'] : NULL;
	$nombre        		= isset($_POST['nombre']) ? $_POST['nombre'] : NULL;
	$direccion      	= isset($_POST['direccion']) ? $_POST['direccion'] : NULL;
    $telefono      		= isset($_POST['telefono']) ? $_POST['telefono'] : NULL;
    $email     			= isset($_POST['email']) ? $_POST['email'] : NULL;
    $estado    			= isset($_POST['estado']) ? $_POST['estado'] : NULL;
	$idvendeli    		= isset($_POST['idvendeli']) ? $_POST['idvendeli'] : NULL;
	$actu          		= isset($_POST['actu']) ? $_POST['actu'] : NULL;
	$idvende      		= isset($_GET['id']) ? $_GET['id'] : NULL;	

	/*
		Variables para aplicar el formato de Mayusculas y minusculas
	*/
	//$newName = $vendedor->sentence_case($nombre);
	//$newContac = $vendedor->sentence_case($direccion);
	$newName = $vendedor->sentence_case_test($nombre);
	$newContac = $vendedor->sentence_case_test($direccion);
	/*
		Comprobacion datos para insertar
	*/
	if ($idvendedor&& $nombre && $telefono && $estado && !$actu) 
	{
        
		$vendedor->insertar_vendedor($idvendedor,$newName,$newContac,$telefono,$email,$estado);
	}
	/*
		Comprobacion datos para actualizar
	*/
	if ($idvendedoredit && $nombre && $telefono && $estado && $actu) 
	{
		$vendedor->actualizar_vendedor($idvendedoredit,$newName,$newContac,$telefono,$email,$estado);
	}
	/*
		Comprobar el id para editar ese unico registro
	*/
	if ($idvende) 
	{
		$consultaedit = $vendedor->consultar_vendedor_id($idvende);
	}
	/*
		Eliminar el registro 
	*/
	if ($idvendeli) 
	{
		$vendedor->eliminar_vendedor($idvendeli);
	}