<?php
	class Funciones {
        
		function functions() { }
		
		/*
         * Función de utilidad para las sentencias SQL de inserción (INSERT), actualización (UPDATE) y eliminación (DELETE) 
         */

        function cons ($sentencia_sql) 
        {
                $conexionBD = new conexion();
                $conexionBD -> conectarBD();
                $conexionBD -> ejeCon($sentencia_sql, 1);
        }
        
        /*
         * Función de utilidad para la sentencia de consulta SQL (SELECT)
         */
        
        function SeleccionDatos($consulta)
        {
                $conexionBD = new conexion();
                $conexionBD -> conectarBD();
                $datos = $conexionBD -> ejeCon($consulta, 0);
                return $datos;
        } 
        /*
         * Función para dar el formato de telefono
         */
        function formato_telefono_general($tel)
        {
                $tel = preg_replace('/[^0-9]/', '', $tel);
                if(strlen($tel) == 7){
                        $tel = preg_replace('/([0-9]{2})([0-9]{2})([0-9]{3})/', '$1 $2 $3', $tel);
                }
                 elseif(strlen($tel) == 10){
                        $tel = preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '$1 $2 $3', $tel);
                }
                        
                return $tel;
        }
        /*
         * Función de utilidad para la sentencia de consulta SQL (SELECT)
         */
        function sentence_case($string) 
        { 
            $sentences = preg_split('/([.?! ]+)/', $string, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE); 
            $new_string = ''; 
            foreach ($sentences as $key => $sentence) { 
                $new_string .= ($key & 1) == 0? 
                    ucfirst(strtolower(trim($sentence))) : 
                    $sentence.' '; 
            } 
            return trim($new_string); 
        } 
    }
