<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CitasModel;
use App\RolesModel;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    public function index()
    {

        $join = DB::table('representante_empresa')->join('empresas', 'representante_empresa.cc_rprt_legal', '=', 'empresas.cc_rprt_legal')->select('representante_empresa.*', 'empresas.*')->get();

        if (request()->ajax()) {

            return datatables()->of($join)

                ->addColumn('afiliado', function ($data) {

                    $afiliado = $data->primer_apellido . ' ' . $data->segundo_apellido . ' ' . $data->primer_nombre . ' ' . $data->segundo_nombre;

                    return $afiliado;
                })

                ->addColumn('agenda', function ($data) {
                    $nombre = $data->primer_apellido . ' ' . $data->segundo_apellido . ' ' . $data->primer_nombre . ' ' . $data->segundo_nombre;
                    $agenda = '
                    <div class="text-center">
                        <div class="btn-group">
                            <a identificacion="' . $data->cc_rprt_legal . '" nombre="' . $nombre . '" id="' . $data->id_empresa . '" nit="' . $data->nit_empresa . '" razon="' . $data->razon_social . '" class="btn btn-success btn-sm text-white agendarCitaSeleccionarAfiliado">
                                <i class="fas fa-calendar"></i> Agendar
                            </a>
                        </div>
                    </div>
                ';

                    return $agenda;
                })
                ->rawColumns(['afiliado', 'agenda'])
                ->make(true);
        }

        $roles = RolesModel::all();
        $citas_afiliados = DB::table('representante_empresa')->join('citas', 'representante_empresa.cc_rprt_legal', '=', 'citas.cc_rprt_legal')->join('empresas', 'representante_empresa.cc_rprt_legal', '=', 'empresas.cc_rprt_legal')->select('citas.*', 'representante_empresa.*', 'empresas.razon_social')->get();
        $total_citas_afiliados = count($citas_afiliados);
        $citas_interesados = CitasModel::where("tipo_usuario_cita", "interesado")->get();
        $total_citas_interesados = count($citas_interesados);

        return view("paginas.citas.general", array("roles" => $roles, "citas_afiliados" => $citas_afiliados, "total_citas_afiliados" => $total_citas_afiliados, "citas_interesados" => $citas_interesados, "total_citas_interesados" => $total_citas_interesados));
    }

    public function store(Request $request)
    {
        $afiliado = $request->input("soy_afiliado");
        $interesado = $request->input("soy_interesado");

        if ($afiliado == "true") {
            $datos = array(
                'id_empresa' => $request->input("id_empresa"),
                'cc_rprt_legal' => $request->input("identificacion"),
                'fecha' => $request->input("fecha"),
                'hora' => $request->input("hora"),
                'area' => $request->input("area")
            );
        }

        if ($interesado == "true") {
            $datos = array(
                'cc_interesado' => $request->input("identificacion"),
                'nombre_interesado' => $request->input("nombres"),
                'fecha' => $request->input("fecha"),
                'hora' => $request->input("hora"),
                'area' => $request->input("area")
            );
        }

        /*echo '<pre>'; print_r($datos); echo '</pre>';
    	return;*/

        if (!empty($datos)) {

            if ($afiliado == "true") {
                $validar = \Validator::make($datos, [
                    "id_empresa" => "required|regex:/^[0-9]+$/i",
                    "cc_rprt_legal" => "required|regex:/^[0-9]+$/i",
                    "fecha" => "required|date",
                    "hora" => "required|regex:/^[:\\0-9 ]+$/i",
                    "area" => "required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i"
                ]);
            }

            if ($interesado == "true") {
                $validar = \Validator::make($datos, [
                    "cc_interesado" => "required|regex:/^[0-9]+$/i",
                    "nombre_interesado" => "required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                    "fecha" => "required|date",
                    "hora" => "required|regex:/^[:\\0-9 ]+$/i",
                    "area" => "required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i"
                ]);
            }

            if ($validar->fails()) {

                return redirect("/citas/general")->with("no-validacion", "");
            } else {

                $cita = new CitasModel();

                if ($afiliado == "true") {
                    $cita->id_empresa = $datos["id_empresa"];
                    $cita->tipo_usuario_cita = "afiliado";
                    $cita->cc_rprt_legal = $datos["cc_rprt_legal"];
                    $cita->fecha_cita = $datos["fecha"];
                    $cita->hora_cita = $datos["hora"];
                    $cita->area = $datos["area"];
                    $cita->estado_cita = "pendiente";
                    $cita->color = "#ffc107";
                }

                if ($interesado == "true") {
                    $cita->cc_interesado = $datos["cc_interesado"];
                    $cita->tipo_usuario_cita = "interesado";
                    $cita->nombre_interesado = $datos["nombre_interesado"];
                    $cita->fecha_cita = $datos["fecha"];
                    $cita->hora_cita = $datos["hora"];
                    $cita->area = $datos["area"];
                    $cita->estado_cita = "pendiente";
                    $cita->color = "#ffc107";
                }

                $cita->save();

                return redirect("/citas/general")->with("ok-crear", "");
            }
        } else {

            return redirect("/citas/general")->with("error", "");
        }
    }

    public function show($id)
    {

        $cita_afiliado = DB::table('representante_empresa')->join('citas', 'representante_empresa.cc_rprt_legal', '=', 'citas.cc_rprt_legal')->join('empresas', 'representante_empresa.cc_rprt_legal', '=', 'empresas.cc_rprt_legal')->select('citas.*', 'representante_empresa.primer_nombre', 'representante_empresa.segundo_nombre', 'representante_empresa.primer_apellido', 'representante_empresa.segundo_apellido', 'empresas.razon_social', 'empresas.nit_empresa')->where("id", $id)->get();

        $cita_afiliado = json_decode(json_encode($cita_afiliado), TRUE);

        $roles = RolesModel::all();
        $citas_afiliados = DB::table('representante_empresa')->join('citas', 'representante_empresa.cc_rprt_legal', '=', 'citas.cc_rprt_legal')->join('empresas', 'representante_empresa.cc_rprt_legal', '=', 'empresas.cc_rprt_legal')->select('citas.*', 'representante_empresa.*', 'empresas.razon_social')->get();
        $total_citas_afiliados = count($citas_afiliados);
        $citas_interesados = CitasModel::where("tipo_usuario_cita", "interesado")->get();
        $total_citas_interesados = count($citas_interesados);

        if (count($cita_afiliado) != 0) {
            return view("paginas.citas.general", array("status" => 200, "cita" => $cita_afiliado, "roles" => $roles, "citas_afiliados" => $citas_afiliados, "total_citas_afiliados" => $total_citas_afiliados, "citas_interesados" => $citas_interesados, "total_citas_interesados" => $total_citas_interesados));
        }

        $cita = CitasModel::where("id", $id)->get();
        if (count($cita) != 0) {
            return view("paginas.citas.general", array("status" => 200, "cita" => $cita, "roles" => $roles, "citas_afiliados" => $citas_afiliados, "total_citas_afiliados" => $total_citas_afiliados, "citas_interesados" => $citas_interesados, "total_citas_interesados" => $total_citas_interesados));
        } else {
            return view("paginas.citas.general", array("status" => 404));
        }
    }

    public function update($id, Request $request)
    {

        $afiliado = $request->input("soy_afiliado");
        $interesado = $request->input("soy_interesado");

        if ($afiliado == "true") {
            $datos = array(
                'id_empresa' => $request->input("id_empresa"),
                'cc_rprt_legal' => $request->input("identificacion"),
                'fecha' => $request->input("fecha"),
                'hora' => $request->input("hora"),
                'area' => $request->input("area"),
                'estado' => $request->input("estado")
            );
        }

        if ($interesado == "true") {
            $datos = array(
                'cc_interesado' => $request->input("identificacion"),
                'nombre_interesado' => $request->input("nombres"),
                'fecha' => $request->input("fecha"),
                'hora' => $request->input("hora"),
                'area' => $request->input("area"),
                'estado' => $request->input("estado")
            );
        }

        /*echo '<pre>'; print_r($datos); echo '</pre>';
    	return;*/

        if (!empty($datos)) {

            if ($afiliado == "true") {
                $validar = \Validator::make($datos, [
                    "id_empresa" => "required|regex:/^[0-9]+$/i",
                    "cc_rprt_legal" => "required|regex:/^[0-9]+$/i",
                    "fecha" => "required|date",
                    "hora" => "required|regex:/^[:\\0-9 ]+$/i",
                    "area" => "required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                    "estado" => "required|regex:/^[a-z]+$/i"
                ]);
            }

            if ($interesado == "true") {
                $validar = \Validator::make($datos, [
                    "cc_interesado" => "required|regex:/^[0-9]+$/i",
                    "nombre_interesado" => "required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                    "fecha" => "required|date",
                    "hora" => "required|regex:/^[:\\0-9 ]+$/i",
                    "area" => "required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                    "estado" => "required|regex:/^[a-z]+$/i"
                ]);
            }

            if ($validar->fails()) {

                return redirect("/citas/general")->with("no-validacion", "");
            } else {

                if ($datos["estado"] == "pendiente") {
                    $color = "#ffc107";
                }
                if ($datos["estado"] == "atendida") {
                    $color = "#28a745";
                }
                if ($datos["estado"] == "perdida") {
                    $color = "#dc3545";
                }
                if ($datos["estado"] == "cancelada") {
                    $color = "#ff851b";
                }

                if ($afiliado == "true") {
                    $actualizar = array(
                        'id_empresa' => $datos["id_empresa"],
                        'tipo_usuario_cita' => "afiliado",
                        'cc_rprt_legal' => $datos["cc_rprt_legal"],
                        'fecha_cita' => $datos["fecha"],
                        'hora_cita' => $datos["hora"],
                        'area' => $datos["area"],
                        'estado_cita' => $datos["estado"],
                        'color' => $color
                    );
                }

                if ($interesado == "true") {
                    $actualizar = array(
                        'cc_interesado' => $datos["cc_interesado"],
                        'tipo_usuario_cita' => "interesado",
                        'nombre_interesado' => $datos["nombre_interesado"],
                        'fecha_cita' => $datos["fecha"],
                        'hora_cita' => $datos["hora"],
                        'area' => $datos["area"],
                        'estado_cita' => $datos["estado"],
                        'color' => $color
                    );
                }

                $cita = CitasModel::where("id", $id)->update($actualizar);

                return redirect("/citas/general")->with("ok-actualizar", "");
            }
        } else {

            return redirect("/citas/general")->with("error", "");
        }
    }

    public function destroy($id, Request $request)
    {

        $validar = CitasModel::where("id", $id)->get();
        if (!empty($validar)) {
            $cita = CitasModel::where("id", $validar[0]["id"])->delete();
            return "ok";
        } else {
            return redirect("/citas/general")->with("no-borrar", "");
        }
    }
}
