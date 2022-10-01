<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EntrevistasModel;

class EntrevistasController extends Controller
{
    //php artisan make:controller EntrevistasController

    /*===============================================================
	=            Mostrar todos los registros en la tabla            =
	===============================================================*/

	public function index(){
    	/*$entrevistas = EntrevistasModel::all();

    	return view("paginas.pagina_web.entrevistas", array("entrevistas" => $entrevistas));*/

    	if (request()->ajax()) {
    		return datatables()->of(EntrevistasModel::all())
    		->addColumn('acciones', function($data){

			$acciones = '<div class="btn-group">

							<a href="'.url()->current().'/'.$data->id.'" class="btn btn-warning btn-sm">
								<i class="fas fa-pencil-alt text-white"></i>
							</a>

							<button class="btn btn-danger btn-sm eliminarEntrevista" action="'.url()->current().'/'.$data->id.'" method="DELETE" pagina="pagina_web/entrevistas" token="'.csrf_token().'">
							<i class="fas fa-trash-alt"></i>
							</button>

		  				</div>';

				return $acciones;
			})
			  ->rawColumns(['acciones'])
			  -> make(true);

		}
    	//$roles = RolesModel::all();
    	$entrevistas = EntrevistasModel::all();
    	return view("paginas.pagina_web.entrevistas", array("entrevistas" => $entrevistas));
    }

	/*=====  End of Mostrar todos los registros en la tabla  ======*/


	/*===========================================
	=            Crear nueva noticia            =
	===========================================*/

	public function store(Request $request){
		$datos = array('titulo' => $request->input("titulo_entrevista"),
		 'descripcion' => $request->input("descripcion_entrevista"),
		 'link' => $request->input("video_entrevista"));

		# -----------  Transformación de la URL del video  -----------
		$link_largo = "https://www.youtube.com/watch?v=";
		$link_corto = "https://youtu.be/";
		$link_nuevo = "https://www.youtube.com/embed/";

		$largo = strpos($datos["link"], $link_largo);
		$corto = strpos($datos["link"], $link_corto);

		if ($largo !== false) {
			$datos['link'] = str_replace($link_largo, $link_nuevo, $datos['link']);
		}elseif ($corto !== false) {
			$datos['link'] = str_replace($link_corto, $link_nuevo, $datos['link']);
		}else{
            //http_response_code(404);
			return redirect("/pagina_web/entrevistas")->with("link-no-valido", "");
		}

		/*echo '<pre>'; print_r($datos["link"]); echo '</pre>';
		return;*/


		if(!empty($datos)){

    		$validar = \Validator::make($datos,[
    			"titulo"=> "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
    			"descripcion" => 'required|regex:/^[=\\(\\)\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"link" => 'required|regex:/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-Z ]+$/i'
    		]);



    		if($validar->fails()){

    			return redirect("/pagina_web/entrevistas")->with("no-validacion", "");

    		}else{
    			$entrevista = new EntrevistasModel();

    			$entrevista->titulo_entrevista = $datos["titulo"];
    			$entrevista->descripcion_entrevista = $datos["descripcion"];
    			$entrevista->video_entrevista = $datos["link"];

    			$entrevista->save();

    			return redirect("/pagina_web/entrevistas")->with("ok-crear", "");
    		}

    	}else{

    		return redirect("/pagina_web/entrevistas")->with("error", "");
    	}

	}

	/*=====  End of Crear nueva noticia  ======*/

	/*===========================================================
    =            Mostra un solo registro de la tabla            =
    ===========================================================*/

    public function show($id){

        $entrevista = EntrevistasModel::where("id", $id)->get();
        $entrevistas = EntrevistasModel::all();

        if(count($entrevista) != 0){

            return view("paginas.pagina_web.entrevistas", array("status"=>200, "entrevista"=>$entrevista, "entrevistas"=>$entrevistas));

        }else{

            return view("paginas.pagina_web.entrevistas", array("status"=>404, "entrevistas"=>$entrevistas));
        }
    }

    /*=====  End of Mostra un solo registro de la tabla  ======*/

    /*=============================================
    =            Actualizar entrevista            =
    =============================================*/

    public function update($id, Request $request){

    	$datos = array(
    		'titulo' => $request->input("titulo_entrevista"),
		 	'descripcion' => $request->input("descripcion_entrevista"),
		 	'link' => $request->input("video_entrevista")
		);

        # -----------  Transformación de la URL del video  -----------
		$link_largo = "https://www.youtube.com/watch?v=";
		$link_corto = "https://youtu.be/";
		$link_nuevo = "https://www.youtube.com/embed/";

		$largo = strpos($datos["link"], $link_largo);
		$corto = strpos($datos["link"], $link_corto);

		if ($largo !== false) {
			$datos['link'] = str_replace($link_largo, $link_nuevo, $datos['link']);
		}elseif ($corto !== false) {
			$datos['link'] = str_replace($link_corto, $link_nuevo, $datos['link']);
		}

    	if(!empty($datos)){

    		$validar = \Validator::make($datos,[
    			"titulo"=> "required|regex:/^[¿\\?\\¡\\!\\(\\)\\:\\,\\;\\.\\%\\#\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
    			"descripcion" => 'required|regex:/^[=\\(\\)\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
    			"link" => 'required|regex:/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-Z ]+$/i'
    		]);



    		if($validar->fails()){

    			return redirect("/pagina_web/entrevistas")->with("no-validacion", "");

    		}else{

    			$actualizar = array(
    				'titulo_entrevista' => $datos["titulo"],
    				'descripcion_entrevista' => $datos["descripcion"],
    				'video_entrevista' => $datos["link"]
    			);

    			$entrevista = EntrevistasModel::where("id", $id)->update($actualizar);

    			return redirect("/pagina_web/entrevistas")->with("ok-crear", "");
    		}

    	}else{

    		return redirect("/pagina_web/entrevistas")->with("error", "");
    	}

    }

    /*=====  End of Actualizar entrevista  ======*/

    /*===========================================
    =            Eliminar entrevista            =
    ===========================================*/

    public function destroy($id, Request $request){

    	$validar = EntrevistasModel::where("id", $id)->get();
    	if(!empty($validar)){
    		$entrevista = EntrevistasModel::where("id",$validar[0]["id"])->delete();
    		return "ok";
    	}else{
    		return redirect("/pagina_web/entrevistas")->with("no-borrar", "");
    	}
    }

    /*=====  End of Eliminar entrevista  ======*/



}
