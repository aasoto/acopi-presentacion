<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PagosParametrosModel;
use App\UsuariosModel;
use Illuminate\Support\Facades\Hash;

class ParametrosPagosController extends Controller
{
    public function index() {
    	$parametros = PagosParametrosModel::all();

    	return view("paginas.pagos.parametros", array("parametros" => $parametros));
    }

    public function update($id, Request $request) {
    	$autenticacion = array(
    		"usuario"=>$request->input("usuario"),
    		"password"=>$request->input("password")
    	);

    	$usuario = UsuariosModel::where("email", $autenticacion["usuario"])->get();
    	
    	if (Hash::check($autenticacion["password"], $usuario[0]["password"])) {
    		$datos = array('periodo_activo' => $request->input("periodo_activo"), 'valor_cuota' => $request->input("valor_cuota"));
    		if(!empty($datos)){

	    		$validar = \Validator::make($datos,[
	    			"periodo_activo"=> "required|regex:/^[0-9]+$/i",
	    			"valor_cuota"=> "required|regex:/^[0-9]+$/i"
	    		]);

	    		if($validar->fails()){

	    			return redirect("/pagos/parametros")->with("no-validacion", "");
	    			
	    		}else{
	    			$actualizar = array('periodo_activo' => $datos["periodo_activo"], 'valor_cuota' => $datos["valor_cuota"]);
	    			$actualizado = PagosParametrosModel::where("id", $id)->update($actualizar);
	    			return redirect("/pagos/parametros")->with("ok-actualizar", "");
	    		}

	    	} else {
	    		return redirect("/pagos/parametros")->with("error", "");
	    	}
    	} else {
    		return redirect("/pagos/parametros")->with("no-autenticacion", "");
    	}
    }
    
}
