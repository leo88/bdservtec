<?php

	include 'controlador/conexion.php';
	include 'functions.php';

	class Mproducto extends Funciones
	{
		public function __construct()
		{

		}
        /*
		 *función para el ingreso de los datos de la tabla tbproducto
		 */
		function insertar_producto($idproveedor, $fechaingreso, $referencia, $descripcion, $tipo, $marca, $cantidad, $costo, $subtotal, $precio, $ubicacion)
		{
			$sql = "INSERT INTO tbproducto (idproveedor, fechaingreso, referencia, descripcion, tipo, marca, cantidad, costo, subtotal, precio, ubicacion)
						VALUES ('$idproveedor','$fechaingreso','$referencia','$descripcion','$tipo','$marca','$cantidad','$costo','$subtotal','$precio','$ubicacion');";
			$this -> cons($sql);
		}
		/*
		 *función para la actualización de los datos de la tabla tbproducto
		 */
		function  actualizar_producto($idcodigo, $idproveedor, $fechaingreso, $referencia, $descripcion, $tipo, $marca, $cantidad, $costo, $subtotal, $precio, $ubicacion)
		{
			$sql = "UPDATE tbproducto SET idproveedor = '$idproveedor',fechaingreso = '$fechaingreso',referencia = '$referencia',descripcion = '$descripcion',tipo = '$tipo',marca = '$marca' WHERE idcodigo = '$idcodigo';";
			$this -> cons($sql);
		}
		/*
		 *función para la elimnar datos de la tabla tbproducto
		 */
		function eliminar_producto($idcodigo)
		{
			$sql = "DELETE FROM tbproducto WHERE idcodigo = '$idcodigo'";
			$this -> cons($sql);
		}	
		/*
		 *función para la consulta de los datos de la tabla tbproducto
		 */
		function consultar_producto()
		{
			$sql = "SELECT * FROM tbproducto ORDER BY idcodigo";
			return $this->SeleccionDatos($sql);
		}
		/*
    	 *	Función para retornar los datos de la tbproducto	
         */
		function consultar_producto_id($idcodigo)
		{
			$sql = "SELECT * FROM tbproducto WHERE idcodigo = '$idcodigo' ";
			return $this -> SeleccionDatos($sql);
		}
		 /*
		 	Función para la seleccion de la tabla cliente
		 */
		function sel_proveedor()        
		{
            $sql = "SELECT * FROM `tbproveedor`";
            return $this->SeleccionDatos($sql);
        }
        /*
		 	Función para la seleccion especifica de los datos de la tabla cliente
		 */
		function sel_proveedor1($idproveedor)
		{
			$sql = "SELECT * FROM tbproveedor WHERE idproveedor= '$idproveedor';";
			return $this->SeleccionDatos($sql);
		}
	}