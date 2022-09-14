<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MunicipiosModel;

class MunicipiosController extends Controller
{
    public function index(){
    	if (request()->ajax()) {
    		return datatables()->of(MunicipiosModel::all()) 
    		->addColumn('procedimientos', function($data){

			$procedimientos = '<div class="btn-group">
									
							<a href="'.url()->current().'/'.$data->id.'" class="btn btn-warning btn-sm">
								<i class="fas fa-pencil-alt text-white"></i>
							</a>

							<button class="btn btn-danger btn-sm eliminarMunicipio" action="'.url()->current().'/'.$data->id.'" method="DELETE" pagina="afiliados/municipios" token="'.csrf_token().'">
							<i class="fas fa-trash-alt"></i>
							</button>

		  				</div>';

				return $procedimientos;
			})
			  ->rawColumns(['procedimientos'])
			  -> make(true);

		}

    	return view("paginas.afiliados.municipios");
    }

    public function store(Request $request){
		$datos = array(
			'nombre' => $request->input("nombre"),
			'abreviatura' => $request->input("abreviatura")
		);

		if(!empty($datos)){

    		$validar = \Validator::make($datos,[
    			"nombre"=> "required|regex:/^[-\\a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
    			"abreviatura" => 'required|regex:/^[A-Z]+$/i'
    		]);



    		if($validar->fails()){

    			return redirect("/afiliados/municipios")->with("no-validacion", "");
    			
    		}else{
    			$municipio = new MunicipiosModel();

    			$municipio->nombre = $datos["nombre"];
    			$municipio->abreviatura = $datos["abreviatura"];

    			$municipio->save();

    			return redirect("/afiliados/municipios")->with("ok-crear", "");
    		}

    	}else{

    		return redirect("/afiliados/municipios")->with("error", "");
    	}
	}

	public function show($id){

        $municipio = MunicipiosModel::where("id", $id)->get();
        $municipios = MunicipiosModel::all();
        
        if(count($municipio) != 0){

            return view("paginas.afiliados.municipios", array("status"=>200, "municipio"=>$municipio, "municipios"=>$municipios));
        
        }else{ 

            return view("paginas.afiliados.municipios", array("status"=>404, "municipios"=>$municipios));
        }
    }

    public function update($id, Request $request){
    	$datos = array(
			'nombre' => $request->input("nombre"),
			'abreviatura' => $request->input("abreviatura")
		);

		if(!empty($datos)){

    		$validar = \Validator::make($datos,[
    			"nombre"=> "required|regex:/^[-\\a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
    			"abreviatura" => 'required|regex:/^[A-Z]+$/i'
    		]);



    		if($validar->fails()){

    			return redirect("/afiliados/municipios")->with("no-validacion", "");
    			
    		}else{
    			$actualizar = array(
    				'nombre' => $datos["nombre"],
    				'abreviatura' => $datos["abreviatura"]
    			);
    			$municipio = MunicipiosModel::where("id", $id)->update($actualizar);
    			return redirect("/afiliados/municipios")->with("ok-editar", "");
    		}

    	}else{

    		return redirect("/afiliados/municipios")->with("error", "");
    	}
    }

    public function destroy($id, Request $request){

    	$validar = MunicipiosModel::where("id", $id)->get();    	
    	if(!empty($validar) && $id != 1){
    		$eliminado = MunicipiosModel::where("id",$validar[0]["id"])->delete();
    		return "ok";   	
    	}else{
    		return redirect("/afiliados/municipios")->with("no-borrar", "");
    	}
    }

}
