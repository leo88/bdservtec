<?php

	/*
	 	*	version: 1.0 10/08/2016
	*/

	include 'controlador/conexion.php';
	include 'functions.php';

	class Mserviciotecnico extends Funciones
	{
		public function __construct()
		{

		}
		
        /*
		 *función para el ingreso de los datos de la tabla tbserviciotecnico
		 */
		function InsertarServicio($id_cliente, $dispositivo, $marca, $referencia, $descripcion_st, $observacion, $empleado, $fecha)
		{
			$sql = "INSERT INTO tbserviciotecnico (id_cliente, dispositivo, marca, referencia, descripcion_st, observacion, empleado, fecha)
						VALUES ('".$id_cliente."','".$dispositivo."','".$marca."','".$referencia."','".$descripcion_st."','".$observacion."','".$empleado."','".$fecha."');";
			$this -> cons($sql);
		}
		/*
		 *función para la actualización de los datos de la tabla tbserviciotecnico
		 */
		function  actualizarServicio($numero_orden,$dispositivo,$marca,$referencia, $descripcion_st, $observacion, $fecha)
		{
			$sql = "UPDATE tbserviciotecnico SET dispositivo = '".$dispositivo."',marca = '".$marca."',referencia = '".$referencia."',descripcion_st = '".$descripcion_st."', observacion = '".$observacion."',fecha = '".$fecha."' WHERE numero_orden = '".$numero_orden."';";
			$this -> cons($sql);
		}
		/*
		 *función para la elimnar datos de la tabla tbserviciotecnico
		 */
		function eliminarServicio($numero_orden)
		{
			$sql = "DELETE FROM `tbserviciotecnico` WHERE `numero_orden` = '$numero_orden'";
			$this -> cons($sql);
		}	
		/*
		 *función para la consulta de los datos de la tabla tbserviciotecnico
		 */
		function consultarServicio()
		{
			$sql = "SELECT * FROM tbserviciotecnico ORDER BY numero_orden DESC";
			 return $this->SeleccionDatos($sql);
		}
		/*
    	 *	Función para retornar los datos de la tbserviciotecnico	
         */
		function consultarServicioID($numero_orden)
		{
			$sql = "SELECT * FROM tbserviciotecnico WHERE numero_orden = '$numero_orden' ";
			return $this -> SeleccionDatos($sql);
		}
		 /*
		 	Función para la seleccion de la tabla empleado
		 */
		function seleccionarEmpleado()        
		{
            $sql = "SELECT * FROM `tbempleado`";
            return $this->SeleccionDatos($sql);
        }
        /*
		 	Función para la seleccion especifica de los datos de la tabla empleado
		 */
		function SeleccionarEmpleadoID($idempleado)
		{
			$sql = "SELECT * FROM tbempleado WHERE idempleado='".$idempleado."';";
			return $this->SeleccionDatos($sql);
		}
		 /*
		 	Función para la seleccion de la tabla cliente
		 */
		function seleccionCliente()        
		{
            $sql = "SELECT * FROM `tbcliente`";
            return $this->SeleccionDatos($sql);
        }
        /*
		 	Función para la seleccion especifica de los datos de la tabla cliente
		 */
		function seleccionarClienteID($idcliente)
		{
			$sql = "SELECT * FROM tbcliente WHERE idcliente='".$idcliente."';";
			return $this->SeleccionDatos($sql);
		}
	}