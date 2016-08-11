<?php

	/*
      	* @Version: V1.0 11/08/2016
  	*/

	include 'modelo/mservicioentregado.php';

	$servicioentregado = new Mservicioentregado();

	$idserventedit = isset($_POST['idserv']) ? $_POST['idserv'] : NULL;
	$numero_orden  = isset($_POST['numero_orden']) ? $_POST['numero_orden'] : NULL;
	$fecha         = isset($_POST['fecha']) ? $_POST['fecha'] : NULL;
	$costo 		   = isset($_POST['costo']) ? $_POST['costo'] : NULL;
  $tecnico       = isset($_POST['tecnico']) ? $_POST['tecnico'] : NULL;
	$estado        = isset($_POST['estado']) ? $_POST['estado'] : NULL;
  $idserventeli  = isset($_POST['idserventeli']) ? $_POST['idserventeli'] : NULL;
	$actu          = isset($_POST['actu']) ? $_POST['actu'] : NULL;
	$idservent     = isset($_GET['id']) ? $_GET['id'] : NULL;

	/*
		Variable para traer los datos del desplegable
	*/
    $numorden2 = $servicioentregado->sel_orden();

    /*
		Variables para aplicar el formato de Mayusculas y minusculas
	*/
	$mayusTecnico 	= $servicioentregado->cambiarMayusculas($tecnico);

    /*
		Comprobacion datos para insertar
	*/

	if ($numero_orden && $fecha && $costo && $tecnico && $estado && !$actu)
	{

		$servicioentregado->insertar_servicioentregado($numero_orden,$fecha,$costo,$mayusTecnico,$estado);
	}
	/*
		Comprobacion datos para actualizar
	*/
	if ($idserventedit && $costo && $tecnico && $estado && $actu)
	{
		$servicioentregado->actualizar_servicioentregado($idserventedit,$costo,$mayusTecnico,$estado);
	}
	/*
		Comprobar el id para editar ese unico registro
	*/
	if ($idservent)
	{
		$consultaedit = $servicioentregado->consultar_servicioentregado_id($idservent);
	}
	/*
		Eliminar el registro
	*/
	if ($idserventeli)
	{
		$servicioentregado->eliminar_servicioentregado($idserventeli);
	}
