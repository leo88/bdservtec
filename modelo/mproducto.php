<?php

	/*
			*	version: 1.0 21/07/2016
	*/

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
		function insertar_producto($referencia, $descripcion, $tipo, $marca, $precio, $ubicacion)
		{
			$sql = "INSERT INTO tbproducto (referencia, descripcion, tipo, marca, precio, ubicacion)
						VALUES ('$referencia','$descripcion','$tipo','$marca','$precio','$ubicacion');";
			$this -> cons($sql);
		}
		/*
		 *función para la actualización de los datos de la tabla tbproducto
		 */
		function  actualizar_producto($idcodigo, $referencia, $descripcion, $tipo, $marca, $precio, $ubicacion)
		{
			$sql = "UPDATE tbproducto SET referencia = '$referencia',descripcion = '$descripcion',tipo = '$tipo',marca = '$marca',precio = '$precio',ubicacion = '$ubicacion' WHERE idcodigo = '$idcodigo';";
			$this -> cons($sql);
		}
		/*
		 *función para eliminar datos de la tabla tbproducto
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
	}
