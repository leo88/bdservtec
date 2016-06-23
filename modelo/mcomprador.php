<?php

	include('controlador/conexion.php');
	include('functions.php');

	class Mcomprador extends Funciones
	{
		public function __construct()
		{

		}
        /*
		 *función para el ingreso de los datos de la tabla tbcomprador
		 */
		function insertar_comprador($nombre, $detalle, $telefono)
		{
			$sql = "INSERT INTO tbcomprador (nombre, detalle, telefono)
						VALUES ('".$nombre."','".$detalle."','".$telefono."');";
			$this -> cons($sql);
		}
		/*
		 *función para la actualización de los datos de la tabla tbcomprador
		 */
		function  actualizar_comprador($idcomprador,$nombre,$telefono)
		{
			$sql = "UPDATE tbcomprador SET nombre = '".$nombre."',detalle = '".$detalle."',telefono = '".$telefono."';";
			$this -> cons($sql);
		}
		/*
		 *función para la elimnar datos de la tabla tbcomprador
		 */
		function eliminar_comprador($idcomprador)
		{
			$sql = "DELETE FROM `tbcomprador` WHERE `idcomprador` = '$idcomprador'";
			$this -> cons($sql);
		}	
		/*
		 *función para la consulta del registro mas reciente de la tabla tbcomprador
		 */
		function consultar_comprador()
		{
			$sql = "SELECT * FROM `tbcomprador` ORDER BY idcomprador DESC";
			 return $this->SeleccionDatos($sql);
		}
		/*
    	 *	Función para retornar los datos de la tbcomprador	
         */
		function consultar_comprador_id($idcomprador)
		{
			$sql = "SELECT * FROM tbcomprador WHERE idcomprador = '$idcomprador' ";
			return $this -> SeleccionDatos($sql);
		}		
	}
