<?php
	class conexion {
		var $link;
		var $resultado;
		var $acentos;
		var $mysqli;
		
		protected $ultimoid = "";

		public function __construct() {} // Constructor para inicializar clase
		public function conectarBD() {
			include_once("configuracion.php");

			ini_set('memory_limit', '-1');
			ini_set('max_execution_time', 100);

			$this -> mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
			if($this -> mysqli -> connect_error) {
				die("<h4> No se logro conectar</h4>");
			}
			/*$bd2 = mysqli_select_db($this->link,$bd);
			if(!$bd2) {
				echo "No se puede conectar a la BD";
			}*/
			$acentos = $this -> mysqli -> query("SET NAMES 'utf8'");
		}
		public function desconectarBD() {
			$this -> mysql -> close();
		}

		function ejeCon($con, $op) {
			$this -> resultado = $this -> mysqli -> query($con) or die("La consulta fallo: ". $this -> mysqli -> error);
			if($op == 0) {
				while ($linea = $this -> resultado -> fetch_assoc()) {
					$arrayResultado[] = $linea;
				}
			} else {
				$this -> ultimoid = $this -> mysqli -> insert_id;
				return $this -> ultimoid;
				$arrayResultado[] = 0;
			}
			$resarr = isset ($arrayResultado) ? $arrayResultado: NULL;
			if($resarr) {
				return $arrayResultado;
			}
		}

		public function getUltimoId(){
			return $this->ultimoid;
		}
	}
?>