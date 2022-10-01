<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NoticiasModel;
use App\CategoriasModel;
use App\PaginaWebModel;

class NoticiasController extends Controller
{

    public function index(){
    	$noticias = NoticiasModel::all();
    	$categorias = CategoriasModel::all();

    	return view("paginas.pagina_web.noticias", array("noticias" => $noticias, "categorias" => $categorias));
        /*if (request()->ajax()) {
            return datatables()->of(NoticiasModel::all())
            ->addColumn('acciones', function($data){

            $acciones = '<div class="btn-group">

                            <a href="'.url()->current().'/'.$data->id.'" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt text-white"></i>
                            </a>

                            <button class="btn btn-danger btn-sm eliminarNoticia" action="'.url()->current().'/'.$data->id.'" method="DELETE" pagina="usuarios/consultarNoticia" token="'.csrf_token().'">
                            <i class="fas fa-trash-alt"></i>
                            </button>

                        </div>';

                return $acciones;
            })
              ->rawColumns(['acciones'])
              -> make(true);

        }

        $noticias = NoticiasModel::all();
        $categorias = CategoriasModel::all();
        return view("paginas.pagina_web.noticias", array("noticias" => $noticias, "categorias" => $categorias));*/
    }



    /*===========================================
    =            Crear nueva noticia            =
    ===========================================*/

    public function store(Request $request){

    	// Regocer datos
    	$datos = array(
            "escenario"=>$request->input("escenario"),
            "titulo"=>$request->input("titulo"),
            "categoria"=>$request->input("categoria"),
            "descripcion"=>$request->input("descripcion"),
            "palabras_claves"=>$request->input("palabras_claves"),
            "ruta_noticia"=>$request->input("ruta"),
            "contenido_noticia"=>$request->input("contenido_noticia"),
            "portada_noticia"=>$request->file("portada_noticia")
        );

    	// Validar datos
    	if(!empty($datos)){

    		$validar = \Validator::make($datos,[

    			"titulo"=> "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
    			"categoria"=> "required|regex:/^[0-9a-zA-Z]+$/i",
    			"descripcion" => 'required|regex:/^[=\\(\\)\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"palabras_claves"=> 'required|regex:/^[,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"ruta_noticia"=> "required|regex:/^[-\\a-z0-9]+$/i",
    			"contenido_noticia" => 'required|string',
    			"portada_noticia"=> "required|image|mimes:jpg,jpeg,png|max:2000000"

    		]);

    		//Guardar noticia
    		if(!$datos["portada_noticia"] || $validar->fails()){

    		 	return redirect("/pagina_web/noticias")->with("no-validacion", "");

    		}else{

    			$aleatorio = mt_rand(10000,99999);

    			$ruta = "vistas/images/noticias/portada/".$aleatorio.".".$datos["portada_noticia"]->guessExtension();

                if ($datos["escenario"] == "prueba") {
                    move_uploaded_file($datos["portada_noticia"], $ruta);
                }

                if ($datos["escenario"] == "sistema") {
                    //Redimensionar Imágen

                    list($ancho, $alto) = getimagesize($datos["portada_noticia"]);

                    $nuevoAncho = 2000;
                    $nuevoAlto = 1333;

                    if(($datos["portada_noticia"]->guessExtension() == "jpeg") || ($datos["portada_noticia"]->guessExtension() == "jpg")){

                        $origen = imagecreatefromjpeg($datos["portada_noticia"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);

                    }

                    if($datos["portada_noticia"]->guessExtension() == "png"){

                        $origen = imagecreatefrompng($datos["portada_noticia"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);

                    }
                }


                // Mover todos los ficheros temporales de blog al destino final
                /**
                 *
                 * en el substr el #19 son el número de caracteres que le restan a la ruta $origen para que pueda ajustarse a la ruta del $fichero.
                 *
                 */

                $origen = glob('vistas/images/temp/*');

                foreach($origen as $fichero){

                    copy($fichero, "vistas/images/noticias/contenido/".substr($fichero, 19));
                    unlink($fichero);

                }

                $paginaweb = PaginaWebModel::all();

                $noticias = new NoticiasModel();
                $noticias->titulo = $datos["titulo"];
                $noticias->descripcion_noticia = $datos["descripcion"];
                $noticias->categoria = $datos["categoria"];
                $noticias->p_claves_noticia = json_encode(explode(",", $datos["palabras_claves"]));
                $noticias->ruta_noticia = $datos["ruta_noticia"];
                $noticias->portada_noticia = $ruta;
                $noticias->contenido_noticia = str_replace('src="'.$paginaweb[0]["servidor"].'vistas/images/temp', 'src="'.$paginaweb[0]["servidor"].'vistas/images/noticias/contenido', $datos["contenido_noticia"]);

                $noticias->save();

                return redirect("/pagina_web/noticias")->with("ok-crear", "");


    		}


    	}else{

    		return redirect("/pagina_web/noticias")->with("error", "");
    	}


    }

    /*=====  End of Crear nueva noticia  ======*/


}
