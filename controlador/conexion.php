<?php
	class conexion {
		var $link;
		var $resultado;
		
		function conexion() {} // Constructor para inicializar clase
		function conectarBD() {
			include("configuracion.php");
			$this -> link = mysqli_connect ($serv_bd, $usu_bd, $pass_bd);
			if(!$this -> link) {
				die("<h4> No se logro conectar</h4>");
			}
			$bd2 = mysqli_select_db($this->link,$bd);
			if(!$bd2) {
				echo "No se puede conectar a la BD";
			}
		}
		function desconectarBD() {
			mysqli_close($this -> link);
		}
		function ejeCon($con, $op) {
			$this -> resultado = mysqli_query($this->link,$con) or die("La consulta fallo: ". mysqli_error($this->link));
			if($op == 0) {
				while ($linea = mysqli_fetch_array($this -> resultado)) {
					$arrayResultado[] = $linea;
				}
			} else {
				$arrayResultado[] = 0;
			}
			$resarr = isset ($arrayResultado) ? $arrayResultado: NULL;
			if($resarr) {
				return $arrayResultado;
			}
		}
	}
?>