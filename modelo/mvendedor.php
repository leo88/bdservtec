<?php

	include('controlador/conexion.php');
	include('functions.php');

	class Mvendedor extends Funciones
	{
		public function __construct()
		{

		}
        /*
		 *función para el ingreso de los datos de la tabla tbvendedor
		 */
		function insertar_vendedor($idvendedor, $nombre, $direccion, $telefono, $email, $estado)
		{
			$sql = "INSERT INTO tbvendedor (idvendedor, nombre, direccion, telefono, email, estado)
						VALUES ('".$idvendedor."','".$nombre."','".$direccion."','".$telefono."','".$email."','".$estado."');";
			$this -> cons($sql);
		}
		/*
		 *función para la actualización de los datos de la tabla tbvendedor
		 */
		function  actualizar_vendedor($idvendedor, $nombre, $direccion, $telefono, $email, $estado)
		{
			$sql = "UPDATE tbvendedor SET nombre = '".$nombre."',direccion = '".$direccion."',telefono = '".$telefono."',email = '".$email."',estado = '".$estado."' WHERE idvendedor = '".$idvendedor."';";
			$this -> cons($sql);
		}
		/*
		 *función para la elimnar datos de la tabla tbvendedor
		 */
		function eliminar_vendedor($idvendedor)
		{
			$sql = "DELETE FROM `tbvendedor` WHERE `idvendedor` = '$idvendedor'";
			$this -> cons($sql);
		}	
		/*
		 *función para la consulta de los datos de la tabla tbvendedor
		 */
		function consultar_vendedor()
		{
			$sql = "SELECT * FROM tbvendedor ORDER BY idvendedor";
			 return $this->SeleccionDatos($sql);
		}
		/*
    	 *	Función para retornar los datos de la tbvendedor	
         */
		function consultar_vendedor_id($idvendedor)
		{
			$sql = "SELECT * FROM tbvendedor WHERE idvendedor = '$idvendedor' ";
			return $this -> SeleccionDatos($sql);
		}
	}