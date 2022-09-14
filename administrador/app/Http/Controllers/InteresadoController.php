<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InteresadoModel;

class InteresadoController extends Controller
{
    /*===============================================================
	=            Mostrar todos los registros de la tabla            =
	===============================================================*/

    public function index()
    {

        if (request()->ajax()) {
            return datatables()->of(InteresadoModel::all())
                ->addColumn('estado', function ($data) {
                    if ($data->estado_interesado == "contactado") {
                        $estado = '
                        <div class="btn-group">

                            <a href="' . url()->current() . '/' . $data->id . '" class="btn btn-success btn-sm descontactarInteresado">
                                <i class="fas fa-check text-white"></i> Contactado
                            </a>

                        </div>';
                    } else {

                        $estado = '
                        <div class="btn-group">

                            <button class="btn btn-warning btn-sm text-white contactarInteresado" action="' . url()->current() . '/' . $data->id . '" method="PUT" pagina="pagina_web/interesados" token="' . csrf_token() . '">
                                <i class="fas fa-pencil-alt text-white"></i> Sin contactar
                            </button>

                        </div>';
                    }



                    return $estado;
                })

                ->addColumn('acciones', function ($data) {
                    $acciones = '
                        <div class="btn-group">

                            <button class="btn btn-danger btn-sm eliminarInteresado" action="' . url()->current() . '/' . $data->id . '" method="DELETE" pagina="pagina_web/interesados" token="' . csrf_token() . '">
                            <i class="fas fa-trash-alt"></i>
                            </button>

                        </div>';

                    return $acciones;
                })
                ->rawColumns(['estado', 'acciones'])
                ->make(true);
        }

        $interesados = InteresadoModel::all();
        return view("paginas.pagina_web.interesados");
    }

    /*=====  End of Mostrar todos los registros de la tabla  ======*/

    /*===========================================================
    =            Mostra un solo registro de la tabla            =
    ===========================================================*/

    public function show($id)
    {

        $interesado = InteresadoModel::where("id", $id)->get();
        $interesados = InteresadoModel::all();

        if (count($interesado) != 0) {

            return view("paginas.pagina_web.interesados", array("status" => 200, "interesado" => $interesado, "interesados" => $interesados));
        } else {

            return view("paginas.pagina_web.interesados", array("status" => 404, "interesados" => $interesados));
        }
    }

    /*=====  End of Mostra un solo registro de la tabla  ======*/

    /*========================================================
	=            Actualizar estado de interesados            =
	========================================================*/

    public function update($id, Request $request)
    {

        $validar = InteresadoModel::where("id", $id)->get();
        if (!empty($validar)) {
            $estado = "contactado";
            $actualizar = array('estado_interesado' => $estado);
            $interesado = InteresadoModel::where("id", $validar[0]["id"])->update($actualizar);
            return "ok";
        } else {
            return redirect("/pagina_web/interesados")->with("no-editar", "");
        }
    }

    /*=====  End of Actualizar estado de interesados  ======*/

    /*===========================================
    =            Eliminar interesado            =
    ===========================================*/

    public function destroy($id, Request $request)
    {

        $validar = InteresadoModel::where("id", $id)->get();
        if (!empty($validar) && $id != 1) {
            $interesado = InteresadoModel::where("id", $validar[0]["id"])->delete();
            return "ok";
        } else {
            return redirect("/pagina_web/interesados")->with("no-borrar", "");
        }
    }

    /*=====  End of Eliminar interesado  ======*/
}
