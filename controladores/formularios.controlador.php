<?php

class ControladorFormularios{

	/** Registro **/

	static public function ctrRegistro(){
		if(isset($_POST["registroCategoria"])){

			$tabla = "noticias";

			$datos = array("categoria" => $_POST["registroCategoria"],
							"titulo" => $_POST["registroTitulo"],
							"cuerpo" => $_POST["registroCuerpo"]);

			$respuesta = ModelosFormularios::mdlRegistro($tabla, $datos);
			
			return $respuesta;	
		}
	}
}

?>