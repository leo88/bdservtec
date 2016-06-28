<?php

	include 'controlador/conexion.php';
	include 'functions.php';

	class Mventa extends Funciones
	{
		public function __construct(){}
		
        /*
		 *función para el ingreso de los datos de la tabla
		 */
		function insertar_venta($fechasalida, $idvendedor, $idcomprador, $total)
		{
			$sql = "INSERT INTO tbventa (fechasalida, idvendedor, idcomprador, total)
						VALUES ('".$fechasalida."','".$idvendedor."','".$idcomprador."','".$total."');";
			$this -> cons($sql);
		}
		/*
		 *función para la actualización de los datos de la tabla
		 */
		function  actualizar_venta($idventa, $fechasalida, $idvendedor, $idcomprador,$total)
		{
			$sql = "UPDATE tbventa SET fechasalida = '".$fechasalida."',idvendedor = '".$idvendedor."',idcomprador = '".$idcomprador."',total = '".$total."' WHERE idventa = '".$idventa."';";
			$this -> cons($sql);
		}
		/*
		 *función para la elimnar datos de la tabla
		 */
		/*function eliminar_venta($idventa)
		{
			$sql = "DELETE FROM `tbventa` WHERE `idventa` = '$idventa'";
			$this -> cons($sql);
		}	
		/*
		 *función para la consulta de los datos de la tabla
		 */
		function consultar_venta()
		{
			$sql = "SELECT * FROM tbventa ORDER BY idventa";
			 return $this->SeleccionDatos($sql);
		}
		/*
    	 *	Función para retornar los datos de la tbventa	
         */
		function consultar_venta_id($idventa)
		{
			$sql = "SELECT * FROM tbventa WHERE idventa = '$idventa' ";
			return $this -> SeleccionDatos($sql);
		}
		 /*
		 	Función para la seleccion de la tabla comprador
		 */
		function sel_idcomprador()        
		{
            $sql = "SELECT * FROM `tbcomprador`";
            return $this->SeleccionDatos($sql);
        }
        /*
		 	Función para la seleccion especifica de los datos de la tabla comprador
		 */
		function sel_idcomprador1($idcomprador)
		{
			$sql = "SELECT * FROM tbcomprador WHERE idcomprador='".$idcomprador."';";			
			return $this->SeleccionDatos($sql);
		}
		 /*
		 	Función para la seleccion de la tabla idcomprador
		 */
		function sel_idvendedor()        
		{
            $sql = "SELECT * FROM `tbvendedor`";
            return $this->SeleccionDatos($sql);
        }
        /*
		 	Función para la seleccion especifica de los datos de la tabla idcomprador
		 */
		function sel_idvendedor1($idvendedor)
		{
			$sql = "SELECT * FROM tbvendedor WHERE idvendedor='".$idvendedor."';";
			return $this->SeleccionDatos($sql);
		}

	}