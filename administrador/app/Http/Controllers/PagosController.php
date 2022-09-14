<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PagosModel;
use App\PagosGeneradosModel;
use App\PagosParametrosModel;
use App\UsuariosModel;
use App\EmpresasModel;
use App\PaginaWebModel;
use App\MesesModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isTrue;

class PagosController extends Controller
{
    public function index()
    {
        $paginaweb = PaginaWebModel::all();

        foreach ($paginaweb as $key => $web) {}

        if (url()->current() == ($web["servidor"]."pagos/general")) {
            $join = DB::table('empresas')->join('pagos', 'empresas.id_empresa', '=', 'pagos.id_empresa')->join('representante_empresa', 'empresas.cc_rprt_legal', '=', 'representante_empresa.cc_rprt_legal')->select('pagos.*', 'representante_empresa.*', 'empresas.razon_social')->get();

            if (request()->ajax()) {
                return datatables()->of($join)

                    ->addColumn('representante', function ($data) {
                        $representante = $data->primer_apellido . ' ' . $data->segundo_apellido . ' ' . $data->primer_nombre . ' ' . $data->segundo_nombre;

                        return $representante;
                    })

                    ->addColumn('procedimientos', function ($data) {
                        if ($data->estado == "pagado") {
                            $procedimientos = '
                                <div class="btn-group">
                                    <a href="#" title="Pagado" class="btn btn-success btn-sm">
                                        <i class="fas fa-money-bill-alt text-white"></i>
                                    </a>
                                    <button class="btn btn-default btn-sm eliminarReciboPago" title="Eliminar" action="' . url()->current() . '/'.$data->id.'" method="DELETE" id="'.$data->id.'" pagina="pagos/general" token="' . csrf_token() . '">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            ';
                        }
                        if ($data->estado == "no pago") {
                            $procedimientos = '
                                <div class="btn-group">
                                    <button title="Abonar" class="btn btn-info btn-sm abonarRecibo"  action="' . url()->current() . '/' . $data->id . '" method="PUT" pagina="pagos/general" token="' . csrf_token() . '">
                                        <i class="fas fa-coins text-white"></i>
                                    </button>
                                    <button title="Pagar" class="btn btn-warning btn-sm pagarRecibo" empresa="' . $data->id_empresa . '"  action="' . url()->current() . '/' . $data->id . '" method="PUT" pagina="pagos/general" token="' . csrf_token() . '">
                                        <i class="fas fa-money-bill-alt text-white"></i>
                                    </button>
                                    <button class="btn btn-default btn-sm eliminarReciboPago" title="Eliminar" action="' . url()->current() . '/'.$data->id.'" method="DELETE" id="'.$data->id.'" pagina="pagos/general" token="' . csrf_token() . '">
                                    <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            ';
                        }

                        if ($data->estado == "abonado") {
                            $procedimientos = '
                                <div class="btn-group">
                                    <button title="Abonar" class="btn btn-success btn-sm abonarRecibo"  action="' . url()->current() . '/' . $data->id . '" method="PUT" pagina="pagos/general" token="' . csrf_token() . '">
                                        <i class="fas fa-coins text-white"></i>
                                    </button>
                                    <button title="Pagar" class="btn btn-warning btn-sm pagarRecibo"  action="' . url()->current() . '/' . $data->id . '" method="PUT" pagina="pagos/general" token="' . csrf_token() . '">
                                        <i class="fas fa-money-bill-alt text-white"></i>
                                    </button>
                                    <button class="btn btn-default btn-sm eliminarReciboPago" title="Eliminar" action="' . url()->current() . '/'.$data->id.'" method="DELETE" id="'.$data->id.'" pagina="pagos/general" token="' . csrf_token() . '">
                                    <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            ';
                        }

                        if ($data->estado == "vencido") {
                            $procedimientos = '
                                <div class="btn-group">
                                    <a href="#" title="Vencido" class="btn btn-danger btn-sm">
                                        <i class="fas fa-times text-white"></i>
                                    </a>
                                    <button class="btn btn-default btn-sm eliminarReciboPago" title="Eliminar" action="' . url()->current() . '/'.$data->id.'" method="DELETE" id="'.$data->id.'" pagina="pagos/general" token="' . csrf_token() . '">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            ';
                        }

                        if ($data->estado == "vencido - abonado") {
                            $procedimientos = '
                                <div class="btn-group">
                                    <a href="#" title="Vencido - abonado" class="btn btn-danger btn-sm">
                                        <i class="fas fa-times text-white"></i>
                                    </a>
                                    <button class="btn btn-default btn-sm eliminarReciboPago" title="Eliminar" action="' . url()->current() . '/'.$data->id.'" method="DELETE" id="'.$data->id.'" pagina="pagos/general" token="' . csrf_token() . '">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            ';
                        }

                        if ($data->estado == "pendiente") {
                            $procedimientos = '
                                <div class="btn-group">
                                    <a href="#" title="Pendiente" class="btn btn-default btn-sm infoReciboPendiente">
                                        <i class="fas fa-money-bill-alt text-white"></i>
                                    </a>
                                    <button class="btn btn-default btn-sm eliminarReciboPago" title="Eliminar" action="' . url()->current() . '/'.$data->id.'" method="DELETE" id="'.$data->id.'" pagina="pagos/general" token="' . csrf_token() . '">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            ';
                        }

                        if ($data->estado == "negoceado") {
                            $procedimientos = '
                                <div class="btn-group">
                                    <a href="#" title="Negoceado" class="btn btn-default btn-sm">
                                        <i class="fas fa-hands-helping"></i>
                                    </a>
                                    <button class="btn btn-default btn-sm eliminarReciboPago" title="Eliminar" action="' . url()->current() . '/'.$data->id.'" method="DELETE" id="'.$data->id.'" pagina="pagos/general" token="' . csrf_token() . '">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            ';
                        }

                        return $procedimientos;
                    })

                    ->rawColumns(['representante', 'procedimientos'])
                    ->make(true);
            }

            $pagos = PagosModel::all();
            return view("paginas.pagos.general", array("pagos" => $pagos));
        }

        if (url()->current() == ($web["servidor"]."pagos/ingresar")) {
            $join = DB::table('representante_empresa')->join('empresas', 'representante_empresa.cc_rprt_legal', '=', 'empresas.cc_rprt_legal')->select('representante_empresa.*', 'empresas.*')->get();

            if (request()->ajax()) {

                return datatables()->of($join)

                ->addColumn('afiliado', function ($data) {

                    $afiliado = $data->primer_apellido . ' ' . $data->segundo_apellido . ' ' . $data->primer_nombre . ' ' . $data->segundo_nombre;

                    return $afiliado;
                })

                ->addColumn('procedimiento', function ($data) {
                    $nombre = $data->primer_apellido . ' ' . $data->segundo_apellido . ' ' . $data->primer_nombre . ' ' . $data->segundo_nombre;
                    $procedimiento = '
                    <div class="text-center">
                        <div class="btn-group">
                            <a nombre="' . $nombre . '" id="' . $data->id_empresa . '" nit="' . $data->nit_empresa . '" razon="' . $data->razon_social . '" class="btn btn-success btn-sm text-white ingresarRecibodePago">
                            <i class="fas fa-receipt"></i> Generar
                            </a>
                        </div>
                    </div>
                    ';

                    return $procedimiento;
                })
                ->rawColumns(['afiliado', 'procedimiento'])
                ->make(true);
            }

            $meses = MesesModel::all();

            return view("paginas.pagos.ingresar", array("meses" => $meses));
        }
    }

    public function store(Request $request)
    {
        $paginaweb = PaginaWebModel::all();

        foreach ($paginaweb as $key => $web) {}

        if (url()->current() == ($web["servidor"]."pagos/ingresar")) {
            $datos = array(
                'id_empresa' => $request->input('id_empresa'),
                'valor_mes' => $request->input('valor_mes'),
                'mes' => $request->input('mes'),
                'fecha_limite' => $request->input('fecha_limite')
            );

            if (!empty($datos)) {
                $validar = \Validator::make($datos, [
                    "id_empresa" => "required|regex:/^[0-9]+$/i",
                    "valor_mes" => "required|regex:/^[0-9]+$/i",
                    "mes" => "required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                    "fecha_limite" => "required|date"
                ]);
                if ($validar->fails()) {
                    return redirect("/pagos/ingresar")->with("no-validacion", "");
                } else {
                    $recibo = true;
                    $empresa = EmpresasModel::where("id_empresa", $datos["id_empresa"])->get();
                    if ($empresa[0]["estado_afiliacion_empresa"] == "nueva") {
                        $fecha_afiliacion = strtotime($empresa[0]["fecha_afiliacion_empresa"] . "+ 3 months");
                        $fecha_hoy = strtotime(date("Y-m-d", time()));
                        if ($fecha_afiliacion <= $fecha_hoy) {
                            $actualizar = array(
                                'estado_afiliacion_empresa' => "activa"
                            );
                            $empresa_estado = EmpresasModel::where("id_empresa", $empresa[0]["id_empresa"])->update($actualizar);
                        }
                    }

                    $empresa = EmpresasModel::where("id_empresa", $datos["id_empresa"])->get();

                    if ($empresa[0]["estado_afiliacion_empresa"] == "activa") {
                        $recibos = PagosModel::where("id_empresa", $datos["id_empresa"])->get();
                        $parametros = PagosParametrosModel::all();

                        $year = date("Y");
                        $total_recibos = count($recibos);
                        for ($i=0; $i < $total_recibos; $i++) {
                            if (($datos["mes"] == $recibos[$i]["mes_recibo"]) && ($year == $recibos[$i]["year_recibo"])) {
                                return redirect("/pagos/ingresar")->with("recibo-existe", "");
                            }
                        }

                        $num_recibos = 0;
                        $valor_deuda = 0;
                        for ($j = 0; $j < $total_recibos; $j++) {

                            if (($recibos[$j]["estado"] == "no pago") || ($recibos[$j]["estado"] == "abonado") || ($recibos[$j]["estado"] == "vencido")) {
                                if ($recibos[$j]["estado"] != "abonado") {
                                    $num_recibos++;
                                }
                                if ($num_recibos == $parametros[0]["periodo_activo"]) {
                                    $valor_deuda = $recibos[$j]["valor_recibo"];
                                    $actualizar = array(
                                        'estado' => "pendiente"
                                    );
                                    $pago_estado = PagosModel::where("id", $recibos[$j]["id"])->update($actualizar);
                                    $recibo = false;
                                } else {
                                    $valor_deuda = $recibos[$j]["valor_recibo"];
                                    if ($recibos[$j]["estado"] == "abonado") {
                                        $actualizar = array(
                                            'estado' => "vencido - abonado"
                                        );
                                    } else {
                                        $actualizar = array(
                                            'estado' => "vencido"
                                        );
                                    }
                                    $pago_estado = PagosModel::where("id", $recibos[$j]["id"])->update($actualizar);
                                }
                            }
                        }

                        $meses_deuda = 0;
                        $deuda = PagosModel::where("id_empresa", $datos["id_empresa"])->get();

                        $total_recibos = count($deuda);

                        for ($j = 0; $j < $total_recibos; $j++) {
                            if (($deuda[$j]["estado"] == "vencido") || ($deuda[$j]["estado"] == "pendiente")) {
                                $meses_deuda = $meses_deuda + 1;
                            }
                        }


                        if ($meses_deuda >= $parametros[0]["periodo_activo"]) {
                            $actualizar = array(
                                'estado_afiliacion_empresa' => "inactiva",
                                'numero_pagos_atrasados' => $meses_deuda
                            );
                            $empresa_periodo_activo = EmpresasModel::where("id_empresa", $datos["id_empresa"])->update($actualizar);
                            $activa = false;
                        }
                        if ($meses_deuda < $parametros[0]["periodo_activo"]) {
                            $actualizar = array(
                                'estado_afiliacion_empresa' => "activa",
                                'numero_pagos_atrasados' => $meses_deuda
                            );
                            $empresa_periodo_activo = EmpresasModel::where("id_empresa", $datos["id_empresa"])->update($actualizar);
                        }

                        if ($recibo) {
                            $pago = new PagosModel();

                            $pago->id_empresa = $datos["id_empresa"];
                            $pago->valor_deuda = $valor_deuda;
                            $pago->valor_mes = $parametros[0]["valor_cuota"];
                            $pago->valor_recibo = $pago->valor_deuda + $pago->valor_mes;
                            $pago->mes_recibo = $datos["mes"];
                            $pago->year_recibo = date("Y");
                            $pago->fecha_limite = $datos["fecha_limite"];
                            $pago->estado = "no pago";

                            $pago->save();

                            return redirect("/pagos/ingresar")->with("ok-crear", "");
                        } else {
                            return redirect("/pagos/ingresar")->with("empresa-inactiva", "");
                        }

                    } else {
                        return redirect("/pagos/ingresar")->with("empresa-inactiva", "");
                    }

                }
            } else {
                return redirect("/pagos/general")->with("no-validacion", "");
            }
        }

        if (url()->current() == ($web["servidor"]."pagos/general")) {
            $datos = array(
                "usuario" => $request->input("usuario"),
                "password" => $request->input("password")
            );

            $usuario = UsuariosModel::where("email", $datos["usuario"])->get();

            if (Hash::check($datos["password"], $usuario[0]["password"])) {

                /*----------  Verificar si pagos existen  ----------*/
                $existe = PagosGeneradosModel::all();
                $hasta = count($existe);
                for ($i = 0; $i < $hasta; $i++) {
                    if (($existe[$i]["month"] == date("m")) && ($existe[$i]["year"] == date("Y"))) {
                        return redirect("/pagos/general")->with("pagos_generados", "");
                    }
                }

                /*----------  traer empresas y parametros de los pagos  ----------*/
                $empresas = EmpresasModel::all();
                $limite = count($empresas);

                $parametros = PagosParametrosModel::all();

                for ($i = 0; $i < $limite; $i++) {
                    if ($empresas[$i]["estado_afiliacion_empresa"] == "nueva") {
                        $fecha_afiliacion = strtotime($empresas[$i]["fecha_afiliacion_empresa"] . "+ 3 months");
                        $fecha_hoy = strtotime(date("Y-m-d", time()));
                        if ($fecha_afiliacion <= $fecha_hoy) {
                            $actualizar = array(
                                'estado_afiliacion_empresa' => "activa"
                            );
                            $empresa_estado = EmpresasModel::where("id_empresa", $empresas[$i]["id_empresa"])->update($actualizar);
                        }
                    }
                }


                $empresas = EmpresasModel::all();
                $year = date("Y");
                $month = date("m");

                $mes = MesesModel::where("codigo_mes", $month)->get();

                /*echo '<pre>'; print_r($mes[0]["nombre_mes_min"]); echo '</pre>';
                return;*/

                for ($i = 0; $i < $limite; $i++) {

                    if ($empresas[$i]["estado_afiliacion_empresa"] == "activa") {
                        $activa = true;
                        $recibo = true;
                        /*------------------------------------------------*/

                        $deuda = PagosModel::where("id_empresa", $empresas[$i]["id_empresa"])->get();
                        $total_recibos = count($deuda);

                        for ($j=0; $j < $total_recibos; $j++) {
                            if (($mes[0]["nombre_mes_min"] == $deuda[$j]["mes_recibo"]) && ($year == $deuda[$j]["year_recibo"])) {
                                $recibo = false;
                            }
                        }

                        $num_recibos = 0;
                        $valor_deuda = 0;
                        for ($j = 0; $j < $total_recibos; $j++) {

                            if (($deuda[$j]["estado"] == "no pago") || ($deuda[$j]["estado"] == "abonado")) {
                                if ($deuda[$j]["estado"] != "abonado") {
                                    $num_recibos++;
                                }
                                if ($num_recibos == $parametros[0]["periodo_activo"]) {
                                    $valor_deuda = $deuda[$j]["valor_recibo"];
                                    $actualizar = array(
                                        'estado' => "pendiente"
                                    );
                                    $pago_estado = PagosModel::where("id", $deuda[$j]["id"])->update($actualizar);
                                } else {
                                    $valor_deuda = $deuda[$j]["valor_recibo"];
                                    $mes_recibo = MesesModel::where("nombre_mes_min", $deuda[$j]["mes_recibo"])->get();
                                    if (($month > $mes_recibo[0]["codigo_mes"]) && ($year >= $deuda[$j]["year_recibo"])) {
                                        if ($deuda[$j]["estado"] == "abonado") {
                                            $actualizar = array(
                                                'estado' => "vencido - abonado"
                                            );
                                        } else {
                                            $actualizar = array(
                                                'estado' => "vencido"
                                            );
                                        }
                                    } else {
                                        $actualizar = array(
                                            'estado' => $deuda[$j]["estado"]
                                        );
                                    }
                                    $pago_estado = PagosModel::where("id", $deuda[$j]["id"])->update($actualizar);
                                }
                            }
                        }

                        /*****************************************************/
                        $meses_deuda = 0;
                        $deuda = PagosModel::where("id_empresa", $empresas[$i]["id_empresa"])->get();

                        $total_recibos = count($deuda);

                        for ($j = 0; $j < $total_recibos; $j++) {
                            if (($deuda[$j]["estado"] == "vencido") || ($deuda[$j]["estado"] == "pendiente")) {
                                $meses_deuda = $meses_deuda + 1;
                            }
                        }


                        if ($meses_deuda >= $parametros[0]["periodo_activo"]) {
                            $actualizar = array(
                                'estado_afiliacion_empresa' => "inactiva",
                                'numero_pagos_atrasados' => $meses_deuda
                            );
                            $empresa_periodo_activo = EmpresasModel::where("id_empresa", $empresas[$i]["id_empresa"])->update($actualizar);
                            $activa = false;
                        }
                        if ($meses_deuda < $parametros[0]["periodo_activo"]) {
                            $actualizar = array(
                                'estado_afiliacion_empresa' => "activa",
                                'numero_pagos_atrasados' => $meses_deuda
                            );
                            $empresa_periodo_activo = EmpresasModel::where("id_empresa", $empresas[$i]["id_empresa"])->update($actualizar);
                        }
                        /*****************************************************/

                        if ($activa && $recibo) {
                            $pago = new PagosModel();

                            $pago->id_empresa = $empresas[$i]["id_empresa"];
                            $pago->valor_deuda = $valor_deuda;
                            $pago->valor_mes = $parametros[0]["valor_cuota"];
                            $pago->valor_recibo = $pago->valor_deuda + $pago->valor_mes;
                            setlocale(LC_TIME, "spanish");
                            $pago->mes_recibo = strftime("%B");
                            $pago->year_recibo = date("Y");
                            $fecha = date('Y-m-d');
                            $fecha_limite = date("Y-m-d", strtotime($fecha . "+ 10 days"));
                            $pago->fecha_limite = $fecha_limite;
                            $pago->estado = "no pago";

                            $pago->save();
                        }
                    }
                }

                /*----------  Registro en historial pagos generados  ----------*/
                $generado = new PagosGeneradosModel();

                $generado->month = date('m');
                $generado->year = date('Y');

                $generado->save();
                return redirect("/pagos/general")->with("ok-crear", "");
            } else {
                return redirect("/pagos/general")->with("no-validacion", "");
            }
        }

    }

    public function update($id, Request $request)
    {

        $validar = PagosModel::where("id", $id)->get();
        /*echo '<pre>'; print_r('Request: '.$request); echo '</pre>';
		return;*/
        if (!empty($validar)) {

            if (!empty($request->input("accion"))) {
                $_POST["accion"] = $request->input("accion");
            }

            if ($_POST["accion"] == "abonar") {
                $valor_recibo = $validar[0]["valor_recibo"] - $_POST["cantidad"];
                $actualizar = array(
                    'valor_abono' => $_POST["cantidad"],
                    'valor_recibo' => $valor_recibo,
                    'estado' => "abonado",
                    'id_reporta' => Auth::user()->id,
                    'fecha_reporte' => date('Y-m-d H:i:s', time())
                );
                $pagos = PagosModel::where("id", $validar[0]["id"])->update($actualizar);
                return "ok";
            }
            if ($_POST["accion"] == "pagar") {
                $actualizar = array(
                    'estado' => "pagado",
                    'id_reporta' => Auth::user()->id,
                    'fecha_reporte' => date('Y-m-d H:i:s', time())
                );
                $pagos = PagosModel::where("id", $validar[0]["id"])->update($actualizar);
                $validar = PagosModel::where("id_empresa", $_POST["empresa"])->get();
                if (!empty($validar)) {
                    $total_recibos = count($validar);
                    for ($i = 0; $i < $total_recibos; $i++) {
                        if ($validar[$i]["estado"] == "vencido") {
                            $actualizar = array(
                                'estado' => "negoceado",
                                'id_reporta' => Auth::user()->id,
                                'fecha_reporte' => date('Y-m-d H:i:s', time())
                            );
                            $pagos = PagosModel::where("id", $validar[$i]["id"])->update($actualizar);
                        }
                    }
                }
                return "ok";
            }
        } else {
            return redirect("/pagos/general")->with("no-editar", "");
        }
    }

    public function destroy($id, Request $request)
    {
        $validar = PagosModel::where("id", $id)->get();
        if (!empty($validar)) {
            $cita = PagosModel::where("id", $validar[0]["id"])->delete();
            return "ok";
        } else {
            return redirect("/pagos/general")->with("no-borrar", "");
        }
    }
}
