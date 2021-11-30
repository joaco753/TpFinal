<?php 
	class BD{

        private static $conexion=NULL;

        public static function crearConexion(){

            if(!isset( self::$conexion)){

                self::$conexion = mysqli_connect("localhost","root", "root", "consecionaria");

                if (!self::$conexion) {
                    die("La conexion fallo: " . mysqli_connect_error());
                }
            }

            return self::$conexion;
        }
	}
?>