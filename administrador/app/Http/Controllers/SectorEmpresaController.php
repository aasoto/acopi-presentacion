<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SectorEmpresaModel;

class SectorEmpresaController extends Controller
{
    public function index(){
    	if (request()->ajax()) {
    		return datatables()->of(SectorEmpresaModel::all()) 
    		->addColumn('procedimientos', function($data){

			$procedimientos = '
				<div class="btn-group">
					<a href="'.url()->current().'/'.$data->id_sector.'" class="btn btn-warning btn-sm">
						<i class="fas fa-pencil-alt text-white"></i>
					</a>
					<button class="btn btn-danger btn-sm eliminarSectorEmpresa" action="'.url()->current().'/'.$data->id_sector.'" method="DELETE" pagina="afiliados/sectorempresas" token="'.csrf_token().'">
						<i class="fas fa-trash-alt"></i>
					</button>
				</div>
			';

			return $procedimientos;
			})
			  ->rawColumns(['procedimientos'])
			  -> make(true);

		}

    	return view("paginas.afiliados.sectorempresas");
    }

    public function store(Request $request){
		$datos = array(
			'nombre' => $request->input("nombre")
		);

		if(!empty($datos)){

    		$validar = \Validator::make($datos,[
    			"nombre"=> "required|regex:/^[-\\a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i"
    		]);



    		if($validar->fails()){

    			return redirect("/afiliados/sectorempresas")->with("no-validacion", "");
    			
    		}else{
    			$sector = new SectorEmpresaModel();

    			$sector->nombre_sector = $datos["nombre"];

    			$sector->save();

    			return redirect("/afiliados/sectorempresas")->with("ok-crear", "");
    		}

    	}else{

    		return redirect("/afiliados/sectorempresas")->with("error", "");
    	}
	}

	public function show($id){

        $sector = SectorEmpresaModel::where("id_sector", $id)->get();
        $sectores = SectorEmpresaModel::all();
        
        if(count($sector) != 0){

            return view("paginas.afiliados.sectorempresas", array("status"=>200, "sector"=>$sector, "sectores"=>$sectores));
        
        }else{ 

            return view("paginas.afiliados.sectorempresas", array("status"=>404, "sectores"=>$sectores));
        }
    }

    public function update($id, Request $request){
    	$datos = array(
			'nombre' => $request->input("nombre")
		);

		if(!empty($datos)){

    		$validar = \Validator::make($datos,[
    			"nombre"=> "required|regex:/^[-\\a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i"
    		]);



    		if($validar->fails()){

    			return redirect("/afiliados/sectorempresas")->with("no-validacion", "");
    			
    		}else{
    			$actualizar = array(
    				'nombre_sector' => $datos["nombre"]
    			);
    			$sector = SectorEmpresaModel::where("id_sector", $id)->update($actualizar);
    			return redirect("/afiliados/sectorempresas")->with("ok-editar", "");
    		}

    	}else{

    		return redirect("/afiliados/sectorempresas")->with("error", "");
    	}
    }

    public function destroy($id, Request $request){

    	$validar = SectorEmpresaModel::where("id_sector", $id)->get();    	
    	if(!empty($validar) && $id != 1){
    		$eliminado = SectorEmpresaModel::where("id_sector",$validar[0]["id_sector"])->delete();
    		return "ok";   	
    	}else{
    		return redirect("/afiliados/sectorempresas")->with("no-borrar", "");
    	}
    }
}
