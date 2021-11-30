<?php

class Auto {
	private $id;
	private $marca;
	private $modelo;
	private $anio;
	private $precio;

	public function __construct($id, $marca, $modelo, $anio,$precio) {
		$this -> id = $id;
		$this -> marca = $marca;
		$this -> modelo = $modelo;
		$this -> anio = $anio;
		$this -> precio = $precio;
	}

	public function getId(){return $this -> id;} 
	public function getMarca(){return $this -> marca;}
	public function getModelo(){return $this -> modelo;} 
	public function getAnio(){return $this -> anio;} 
	public function getPrecio(){return $this -> precio;} 

	public static function consultar($queryId){
		$i = 0;
		$listarAutos = [];
		$conexion = BD::crearConexion();
		$consulta = $queryId ? "SELECT * FROM autos WHERE id = '$queryId'" : "SELECT * FROM autos";
		if ($resultado = mysqli_query($conexion, $consulta)) {
			while ($autos= $resultado->fetch_object()) {
				$listarAutos[$i] = new Auto($autos->id, $autos->marca, $autos->modelo, $autos->anio, $autos->precio);
				$i = $i + 1;
			}
		}
		return $listarAutos;
		
	}

	public static function borrar($id){
		$conexion = BD::crearConexion();
		$query = "DELETE FROM autos WHERE id = '$id'";
		$exito = mysqli_query($conexion, $query);

		if(!$exito){
			echo "Hubo un error al eliminar el producto: ".mysqli_error($conexion);
		}
	}

	public static function editar($id, $marca, $modelo, $anio,$precio){
		$conexion = BD::crearConexion();
		$query = "UPDATE autos SET 
							marca ='$marca', 
							modelo='$modelo',
							anio=  '$anio',
							precio='$precio'  
							WHERE id = '$id'";
		$exito = mysqli_query($conexion, $query);

		if(!$exito){
			echo "Hubo un error al actualizar el producto: ".mysqli_error($conexion);
		}
	}

	public static function buscar($id){
		$conexion = BD::crearConexion();
		$query = "SELECT * FROM autos WHERE id = '$id' ";
		$resultado = mysqli_query($conexion, $query);

		if($resultado){
			//Verificamos que halla encontrado un resultado
			if (mysqli_num_rows($resultado) > 0){
				//Obtenemos el resultado como un objeto
				$autos = $resultado->fetch_object();

				//Devolvemos un objeto del tipo Producto
				return new Auto($autos->id, $autos->marca, $autos->modelo, $autos -> anio,$autos->precio);
			}
			else{
				echo "El producto con ese ID no se encuentro";
			}
			
		}
		else{
			echo "Hubo un error al buscar el producto: ".mysqli_error($conexion);
		}
	}

	public static function registrar($marca, $modelo, $anio, $precio){
		
		$conexion = BD::crearConexion();

 		$query = "INSERT INTO autos (marca, modelo, anio, precio) values ('$marca','$modelo','$anio', '$precio')";
		$exito = mysqli_query($conexion, $query);
		
		if($exito){
			echo "Se guardaron correctamente los datos";
		}
		else{
			echo "Hubo un error al guardar los datos".mysqli_error($conexion);
		}
	}
}

?>
