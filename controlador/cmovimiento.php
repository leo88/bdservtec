<?php

	include 'modelo/mmovimiento.php';

	$movimiento = new Mmovimiento();

	$idmovimientoedit 	= isset($_POST['idmovimiento']) ? $_POST['idmovimiento'] : NULL;
	$idgeneral      	= isset($_POST['idgeneral']) ? $_POST['idgeneral'] : NULL;
	$motivo      		= isset($_POST['motivo']) ? $_POST['motivo'] : NULL;
	$idcodigo         	= isset($_POST['idcodigo']) ? $_POST['idcodigo'] : NULL;
	$cantidad   		= isset($_POST['cantidad']) ? $_POST['cantidad'] : NULL;
	$valor   			= isset($_POST['valor']) ? $_POST['valor'] : 0;
  	$idmovimientoeli  	= isset($_POST['idmovimientoeli']) ? $_POST['idmovimientoeli'] : NULL;
	$actu          		= isset($_POST['actu']) ? $_POST['actu'] : NULL;
	$idmovimiento     	= isset($_GET['id']) ? $_GET['id'] : NULL;

	/*
		Variables para traer los datos de los desplegables
	*/
	$idcodigo2		= $movimiento->sel_producto();
	$idgeneral2		= $movimiento->sel_numeroventa();
	$idgeneral3		= $movimiento->sel_numerocompra();

	/*
		Se evalua el boton de envio desde el formulario, para las salidas la cantidad sera negativa
		mientras que para las entradas la cantidad sera positiva
	*/
    if (isset($_POST['Sale'])) {
    //Out action
    	$cantidad=$cantidad*(-1);
	}
	if (isset($_POST['Entra'])) {
    //In action
		$cantidad=$cantidad*1;
	}

	/*
		Comprobacion datos para insertar
	*/
	if ($idgeneral && $motivo && $idcodigo && $cantidad && !$actu)
	{
		$movimiento->insertar_movimiento($idgeneral, $motivo, $idcodigo, $cantidad, $valor);
	}
    /*
		Comprobacion datos para actualizar
	*/
    if ($idmovimientoedit && $motivo && $idcodigo && $cantidad && $actu)
	{
		$movimiento->actualizar_movimiento($idmovimientoedit,$idgeneral,$motivo, $idcodigo, $cantidad,$valor);
	}
	/*
		Comprobar el id para editar ese unico registro
	*/
	if ($idmovimiento)
	{
		$consultaedit = $movimiento->consultar_movimiento_id($idmovimiento);
	}
	/*
		Eliminar el registro
	*/
	if ($idmovimientoeli)
	{
		$movimiento->eliminar_movimiento($idmovimientoeli);
	}
