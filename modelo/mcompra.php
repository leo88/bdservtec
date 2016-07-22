<?php

  /*
      *	version: 1.0 22/07/2016
  */

	include_once 'controlador/conexion.php';
	include_once 'functions.php';

	class Mcompra extends Funciones
	{
		public function __construct()
		{

		}

        /*
		 *función para el ingreso de los datos de la tabla tbcompra
		 */
		function insertar_compra($proveedor, $fecha)
		{
			$sql = "INSERT INTO tbcompra (proveedor, fecha)
						VALUES ('".$proveedor."','".$fecha."');";
			$this -> cons($sql);
		}
		/*
		 *función para la actualización de los datos de la tabla tbcompra
		 */
		function  actualizar_compra($numero_compra,$proveedor, $fecha)
		{
			$sql = "UPDATE tbcompra SET proveedor = '".$proveedor."',fecha = '".$fecha."' WHERE numero_compra = '".$numero_compra."';";
			$this -> cons($sql);
		}
		/*
		 *función para la elimnar datos de la tabla tbcompra
		 */
		/*function eliminar_compra($numero_compra)
		{
			$sql = "DELETE FROM `tbcompra` WHERE `numero_compra` = '$numero_compra'";
			$this -> cons($sql);
		}	*/
		/*
		 *función para la consulta de los datos de la tabla tbcompra
		 */
		function consultar_compra()
		{
			$sql = "SELECT * FROM tbcompra ORDER BY numero_compra DESC LIMIT 1";
			 return $this->SeleccionDatos($sql);
		}
		/*
    	 *	Función para retornar los datos de la tbcompra
         */
		function consultar_compra_id($numero_compra)
		{
			$sql = "SELECT * FROM tbcompra WHERE numero_compra = '$numero_compra' ";
			return $this -> SeleccionDatos($sql);
		}
		 /*
		 	Función para la seleccion de la tabla proveedor
		 */
		function sel_proveedor()
		{
            $sql = "SELECT * FROM `tbproveedor`";
            return $this->SeleccionDatos($sql);
        }
        /*
		 	Función para la seleccion especifica de los datos de la tabla proveedor
		 */
		function sel_proveedor1($idproveedor)
		{
			$sql = "SELECT * FROM tbproveedor WHERE idproveedor='".$idproveedor."';";
			return $this->SeleccionDatos($sql);
		}

	}
