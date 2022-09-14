<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NoticiasModel;
use App\CategoriasModel;
use App\PaginaWebModel;
//Libería para hacer inner join
use Illuminate\Support\Facades\DB;

class ConsultarNoticiaController extends Controller
{
    /*===============================================================
	=            Mostrar todos los registros en la tabla            =
	===============================================================*/

	public function index(){
        $join = DB::table('categorias')->join('noticias','categorias.id_categoria','=','noticias.categoria')->select('categorias.*','noticias.*')->get();

        if(request()->ajax()){

            return datatables()->of($join)
            ->addColumn('nombre_categoria', function($data){
            	/**
            	 *
            	 * Se coloca el nombre según se encuentra la tabla que lo tiene
                 * ejemplo: noticias solo es encuentra el id, así que aquí se retorna es el nombre que se encuentra en la tabla cateogorías, es decir nombre_categoria.
            	 *
            	 */

            $nombre_categoria = $data->nombre_categoria;

            return $nombre_categoria;

            })
            ->addColumn('destacado', function($data){

            	if ($data->destacado == 0) {
            		return 'No';
            	}elseif ($data->destacado == 1) {
            		return 'Sí';
            	}else{
            		return 'Error';
            	}

            })
            ->addColumn('acciones', function($data){

                $botones = '<div class="btn-group">
                            <a href="'.url()->current().'/'.$data->id.'" class="btn btn-warning btn-sm">
                              <i class="fas fa-pencil-alt text-white"></i>
                            </a>

                            <button class="btn btn-danger btn-sm eliminarNoticia" portada="'.$data->portada_noticia.'" action="'.url()->current().'/'.$data->id.'" method="DELETE" token="'.csrf_token().'" pagina="pagina_web/consultarNoticia"> <i class="fas fa-trash-alt"></i></button>

                          </div>';

                return $botones;

            })
            ->rawColumns(['nombre_categoria','acciones'])
            ->make(true);

        }

		$categorias = CategoriasModel::all();

		return view("paginas.pagina_web.consultarNoticia", array("categorias"=>$categorias));
    }

	/*=====  End of Mostrar todos los registros en la tabla  ======*/

    /*===========================================================
    =            Mostra un solo registro de la tabla            =
    ===========================================================*/

    public function show($id){

        $noticia = NoticiasModel::where("id", $id)->get();
        $categorias = CategoriasModel::all();
        $noticias = NoticiasModel::all();

        if(count($noticia) != 0){

            return view("paginas.pagina_web.consultarNoticia", array("status"=>200, "noticia"=>$noticia, "categorias"=>$categorias, "noticias"=>$noticias));

        }else{

            return view("paginas.pagina_web.consultarNoticia", array("status"=>404, "noticias"=>$noticias));
        }
    }

    /*=====  End of Mostra un solo registro de la tabla  ======*/

    /*===========================================
    =            Actualizar noticias            =
    ===========================================*/

    public function update($id, Request $request){
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
        /*echo '<pre>'; print_r($datos); echo '</pre>';
        return;*/
        $portada_actual = array("foto" =>$request->input("portada_noticia_actual"));

        if(!empty($datos)){
            $validar = \Validator::make($datos,[

                "titulo"=> "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                "categoria"=> "required|regex:/^[0-9a-zA-Z]+$/i",
                "descripcion" => 'required|regex:/^[=\\(\\)\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "palabras_claves"=> 'required|regex:/^[,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "ruta_noticia"=> "required|regex:/^[-\\a-z0-9]+$/i",
                "contenido_noticia" => 'required|regex:/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i'


            ]);

            if($validar->fails()){

                return redirect("/pagina_web/consultarNoticia")->with("no-validacion", "");

            }else{

                if($datos["portada_noticia"] != ""){

                    $validarPortada_noticia = \Validator::make($datos, [
                    "portada_noticia"=> "required|image|mimes:jpg,jpeg,png|max:2000000"]);

                    if($validarPortada_noticia->fails()){
                        return redirect("/pagina_web/consultarNoticia")->with("no-validacion-imagen", "");
                    }else{

                        $aleatorio = mt_rand(10000,99999);

                        $ruta = "vistas/images/noticias/portada/".$aleatorio.".".$datos["portada_noticia"]->guessExtension();

                        if ($datos["escenario"] == "prueba") {
                            move_uploaded_file($datos["portada_noticia"], $ruta);
                        }

                        if ($datos["escenario"] == "sistema") {
                            unlink($portada_actual["foto"]);

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

                    }


                }else{
                    $ruta = $portada_actual["foto"];
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

                $actualizar = array("titulo"=>$datos["titulo"],
                                    "categoria"=>$datos["categoria"],
                                    "descripcion_noticia"=>$datos["descripcion"],
                                    "p_claves_noticia"=>json_encode(explode(",", $datos["palabras_claves"])),
                                    "ruta_noticia"=>$datos["ruta_noticia"],
                                    "contenido_noticia"=>str_replace('src="'.$paginaweb[0]["servidor"].'vistas/images/temp', 'src="'.$paginaweb[0]["servidor"].'vistas/images/noticias/contenido', $datos["contenido_noticia"]),
                                    "portada_noticia"=>$ruta);

                $noticia = NoticiasModel::where("id", $id)->update($actualizar);
                return redirect("/pagina_web/consultarNoticia")->with("ok-editar","");
            }

        }else{
            return redirect("/pagina_web/consultarNoticia")->with("error", "");
        }
    }

    /*=====  End of Actualizar noticias  ======*/

    /*=========================================
    =            Eliminar Noticia            =
    =========================================*/

    public function destroy($id, Request $request)
    {

        $validar = NoticiasModel::where("id", $id)->get();
        if (!empty($validar)) {
            $afiliado = NoticiasModel::where("id", $validar[0]["id"])->delete();
            return "ok";
        } else {
            return redirect("/pagina_web/consultarNoticia")->with("no-borrar", "");
        }
    }

    /*=====  End of Eliminar Noticia  ======*/
}
