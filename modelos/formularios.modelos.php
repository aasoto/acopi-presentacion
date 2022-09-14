<?php

require_once "conexion.php";

class ModelosFormularios{

	/** Registro **/

	static public function mdlRegistro($tabla, $datos){

		//stmt statement, es decir declaración
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria, titulo, cuerpo) VALUES (:categoria, :titulo, :cuerpo)");

		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":cuerpo", $datos["cuerpo"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt->close();

		$stmt = null;

	}
}

?>