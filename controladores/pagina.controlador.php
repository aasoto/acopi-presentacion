<?php

/**
* Se crea la clase ControladorPagina
*/
class ControladorPagina
{
	# code... se crear el metodo para mostrar la tabla del blog
	static public function ctrMostrarPagina()
	{
		#se le manda el nombre de la tabla al modelo blog para que esta nos de la respuesta
		$tabla = "pagina_web";

		$respuesta = ModeloPagina::mdlMostrarPagina($tabla);

		return $respuesta;
	}

    static public function ctrMostrarConInnerJoin(){
        $tabla1 = "categorias";
        $tabla2 = "noticias";
        $cantidad = 5;

        $respuesta = ModeloPagina::mdlMostrarConInnerJoin($tabla1, $tabla2, $cantidad);

        return $respuesta;
    }

    static public function ctrMostrarNoticias()
	{
		#se le manda el nombre de la tabla al modelo blog para que esta nos de la respuesta
		$tabla = "noticias";

		$respuesta = ModeloPagina::mdlMostrar($tabla);

		return $respuesta;
	}

    static public function ctrMostrarNoticiasDestacadas()
    {
        #se le manda el nombre de la tabla al modelo blog para que esta nos de la respuesta
        $tabla = "noticias";
        $columna = "destacado";

        $respuesta = ModeloPagina::mdlMostrarNoticiasDestacadas($tabla, $columna);

        return $respuesta;
    }

    static public function ctrContarNoticias(){
        $tabla = "noticias";

        $respuesta = ModeloPagina::mdlContar($tabla);

        return $respuesta;
    }

    static public function ctrContarNoticiasAndYear($year){
        $tabla = "noticias";

        $respuesta = ModeloPagina::mdlContarNoticiasAndYear($tabla, $year);

        return $respuesta;
    }

    static public function ctrContarEventos(){
        $tabla = "noticias";

        $respuesta = ModeloPagina::mdlContarEventos($tabla);

        return $respuesta;
    }

    static public function ctrMostrarNoticiasConPaginacion($pestana, $noticias_por_pestana){
        $tabla1 = "categorias";
        $tabla2 = "noticias";

        $respuesta = ModeloPagina::mdlMostrarNoticiasConPaginacion($pestana, $noticias_por_pestana, $tabla1, $tabla2);

        return $respuesta;
    }

    static public function ctrMostrarNoticiasConPaginacionAndYear($year, $pestana, $noticias_por_pestana){
        $tabla1 = "categorias";
        $tabla2 = "noticias";

        $respuesta = ModeloPagina::mdlMostrarNoticiasConPaginacionAndYear($year, $pestana, $noticias_por_pestana, $tabla1, $tabla2);

        return $respuesta;
    }

    static public function ctrMostrarEventosConPaginacion($pestana, $eventos_por_pestana){
        $tabla1 = "categorias";
        $tabla2 = "noticias";

        $respuesta = ModeloPagina::mdlMostrarEventosConPaginacion($pestana, $eventos_por_pestana, $tabla1, $tabla2);

        return $respuesta;
    }

    static public function ctrConsultaNoticiasGeneralConID($id_noticia){
        $tabla1 = "categorias";
        $tabla2 = "noticias";

        $respuesta = ModeloPagina::mdlConsultaGeneralConID($tabla1, $tabla2, $id_noticia);

        return $respuesta;
    }

    static public function ctrMostrarEntrevistas()
    {
        #se le manda el nombre de la tabla al modelo blog para que esta nos de la respuesta
        $tabla = "entrevistas";
        

        $respuesta = ModeloPagina::mdlMostrarEntrevistas($tabla);

        return $respuesta;
    }

    static public function ctrMostrarProyectos()
    {
        #se le manda el nombre de la tabla al modelo blog para que esta nos de la respuesta
        $tabla1 = "sector_empresa";
        $tabla2 = "proyectos";

        $respuesta = ModeloPagina::mdlMostrarProyectos($tabla1, $tabla2);

        return $respuesta;
    }

    static public function ctrConsultaProyectoConID($id_proyecto){
        $tabla1 = "sector_empresa";
        $tabla2 = "proyectos";

        $respuesta = ModeloPagina::mdlConsultaProyectoConID($tabla1, $tabla2, $id_proyecto);

        return $respuesta;
    }

    /**Enviar datos interesado**/

    static public function ctrEnviarDatosInteresado(){
        if (isset($_POST["nombre_interesado"])){
            if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["nombre_interesado"]) && preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["empresa_interesado"]) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['email_interesado']) && preg_match('/^[0-9]+$/', $_POST['telefono_interesado'])){

                /*=============================================
                VALIDACIÓN FOTO LADO SERVIDOR
                =============================================*/

              /*  if(isset($_FILES["fotoInteresado"]["tmp_name"]) && !empty($_FILES["fotoInteresado"]["tmp_name"])){

                    

                    list($ancho, $alto) = getimagesize($_FILES["fotoInteresado"]["tmp_name"]);

                    $nuevoAncho = 128;
                    $nuevoAlto = 128;


                    $directorio = "images/usuarios/";

                    if($_FILES["fotoInteresado"]["type"] == "image/jpeg"){

                        $aleatorio = mt_rand(100, 9999);

                        $ruta = $directorio.$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["fotoInteresado"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);


                    }else if($_FILES["fotoInteresado"]["type"] == "image/png"){

                        $aleatorio = mt_rand(100, 9999);

                        $ruta = $directorio.$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["fotoInteresado"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagealphablending($destino, FALSE);
            
                        imagesavealpha($destino, TRUE); 

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }else{

                        return "error-formato"; 
                    }

                }else{


                    $ruta = "images/usuarios/default.png";
                }
                

                $tabla = "interesados";

                $datos = array("nombre_interesado" => $_POST["nombre_interesado"],
                                "empresa_interesado" => $_POST["empresa_interesado"],
                                "email_interesado" => $_POST["email_interesado"],
                                "telefono_interesado" => $_POST["telefono_interesado"],
                                "foto_interesado" => $ruta );*/

                $tabla = "interesados";

                $datos = array("nombre_interesado" => $_POST["nombre_interesado"],
                                "empresa_interesado" => $_POST["empresa_interesado"],
                                "email_interesado" => $_POST["email_interesado"],
                                "telefono_interesado" => $_POST["telefono_interesado"]);

                $respuesta = ModeloPagina::mdlEnviarDatosInteresado($tabla, $datos);

                return $respuesta;

            }else{
                return "error preg";
            }
        }
    }
}