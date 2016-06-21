<?php

	include('controlador/conexion.php');
	include('functions.php');

	class Mproveedor extends Funciones
	{
		public function __construct()
		{

		}
        /*
		 *función para el ingreso de los datos de la tabla tbproveedor
		 */
		function insertar_proveedor($idproveedor, $nombre, $contacto, $telefono, $telefono2, $email, $descripcion)
		{
			$sql = "INSERT INTO tbproveedor (idproveedor, nombre, contacto, telefono, telefono2, email, descripcion)
						VALUES ('".$idproveedor."','".$nombre."','".$contacto."','".$telefono."','".$telefono2."','".$email."','".$descripcion."');";
			$this -> cons($sql);
		}
		/*
		 *función para la actualización de los datos de la tabla tbproveedor
		 */
		function  actualizar_proveedor($idproveedor, $nombre, $contacto, $telefono, $telefono2, $email, $descripcion)
		{
			$sql = "UPDATE tbproveedor SET nombre = '".$nombre."',contacto = '".$contacto."',telefono = '".$telefono."',telefono2 = '".$telefono2."',email = '".$email."',descripcion = '".$descripcion."' WHERE idproveedor = '".$idproveedor."';";
			$this -> cons($sql);
		}
		/*
		 *función para la elimnar datos de la tabla tbproveedor
		 */
		function eliminar_proveedor($idproveedor)
		{
			$sql = "DELETE FROM `tbproveedor` WHERE `idproveedor` = '$idproveedor'";
			$this -> cons($sql);
		}	
		/*
		 *función para la consulta de los datos de la tabla tbproveedor
		 */
		function consultar_proveedor()
		{
			$sql = "SELECT * FROM tbproveedor ORDER BY idproveedor DESC";
			 return $this->SeleccionDatos($sql);
		}
		/*
    	 *	Función para retornar los datos de la tbproveedor	
         */
		function consultar_proveedor_id($idproveedor)
		{
			$sql = "SELECT * FROM tbproveedor WHERE idproveedor = '$idproveedor' ";
			return $this -> SeleccionDatos($sql);
		}
	}
