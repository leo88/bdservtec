<?php
	
	/*
	 	*	version: 1.0 10/08/2016
	*/

	include 'modelo/mserviciotecnico.php';

	$serviciotecnico = new Mserviciotecnico();

	$idservitecedit = isset($_POST['numero_orden']) ? $_POST['numero_orden'] : NULL;
	$id_cliente     = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : NULL;	
	$dispositivo    = isset($_POST['dispositivo']) ? $_POST['dispositivo'] : NULL;
	$marca          = isset($_POST['marca']) ? $_POST['marca'] : NULL;
    $referencia     = isset($_POST['referencia']) ? $_POST['referencia'] : NULL;
    $descripcion_st = isset($_POST['descripcion_st']) ? $_POST['descripcion_st'] : NULL;
    $observacion    = isset($_POST['observacion']) ? $_POST['observacion'] : NULL;
    $empleado       = isset($_POST['empleado']) ? $_POST['empleado'] : NULL;
    $fecha          = isset($_POST['fecha']) ? $_POST['fecha'] : NULL;
	$idserviteceli  = isset($_POST['idserviteceli']) ? $_POST['idserviteceli'] : NULL;
	$actu           = isset($_POST['actu']) ? $_POST['actu'] : NULL;
	$numero_orden   = isset($_GET['id']) ? $_GET['id'] : NULL;	
	
	/*
		Variables para traer los datos de los desplegables
	*/
	$empleado2	= $serviciotecnico->seleccionarEmpleado();
	$cliente2	= $serviciotecnico->seleccionarCliente();

	/*
		Variables para aplicar el formato de Mayusculas y minusculas
	*/
	$mayusDispositivo 	= $serviciotecnico->cambiarMayusculas($dispositivo);
	$mayusMarca 		= $serviciotecnico->cambiarMayusculas($marca);

	/*
		Comprobacion datos para insertar
	*/
	if ($id_cliente && $dispositivo && $marca && $referencia && $descripcion_st && $empleado && $fecha && !$actu) 
	{
        
		$serviciotecnico->insertarServicio($id_cliente, $mayusDispositivo, $mayusMarca, $referencia, $descripcion_st, $observacion, $empleado, $fecha);
	}
	/*
		Comprobacion datos para actualizar
	*/
	if ($idservitecedit && $dispositivo && $marca && $referencia && $actu) 
	{
		$serviciotecnico->actualizar_serviciotecnico($idservitecedit, $mayusDispositivo, $mayusMarca, $referencia, $descripcion_st, $observacion, $fecha);
	}
	/*
		Comprobar el id para editar ese unico registro
	*/
	if ($numero_orden) 
	{
		$consultaedit = $serviciotecnico->consultarServicioID($numero_orden);
	}
	/*
		Eliminar el registro 
	*/
	if ($idserviteceli) 
	{
		$serviciotecnico->eliminarServicio($idserviteceli);
	}