<?php

	include('controlador/conexion.php');
	include('functions.php');

	class Mempleado extends Funciones
	{
		public function __construct()
		{

		}
        /*
		 *función para el ingreso de los datos de la tabla tbempleado
		 */
		function insertar_empleado($idempleado, $nombre, $direccion, $telefono, $email, $estado)
		{
			$sql = "INSERT INTO tbempleado (idempleado, nombre, direccion, telefono, email, estado)
						VALUES ('".$idempleado."','".$nombre."','".$direccion."','".$telefono."','".$email."','".$estado."');";
			$this -> cons($sql);
		}
		/*
		 *función para la actualización de los datos de la tabla tbempleado
		 */
		function  actualizar_empleado($idempleado, $nombre, $direccion, $telefono, $email, $estado)
		{
			$sql = "UPDATE tbempleado SET nombre = '".$nombre."',direccion = '".$direccion."',telefono = '".$telefono."',email = '".$email."',estado = '".$estado."' WHERE idempleado = '".$idempleado."';";
			$this -> cons($sql);
		}
		/*
		 *función para la elimnar datos de la tabla tbempleado
		 */
		function eliminar_empleado($idempleado)
		{
			$sql = "DELETE FROM tbempleado WHERE idempleado = '$idempleado'";
			$this -> cons($sql);
		}
		/*
		 *función para la consulta de los datos de la tabla tbempleado
		 */
		function consultar_empleado()
		{
			$sql = "SELECT * FROM tbempleado ORDER BY idempleado DESC";
			 return $this->SeleccionDatos($sql);
		}
		/*
    	 *	Función para retornar los datos de la tbempleado
         */
		function consultar_empleado_id($idempleado)
		{
			$sql = "SELECT * FROM tbempleado WHERE idempleado = '$idempleado' ";
			return $this -> SeleccionDatos($sql);
		}
	}
