<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaginaWebModel;
use App\IndicadoresModel;
use App\MesesModel;
use App\PagosModel;
use App\EmpresasModel;

class IndicadoresController extends Controller
{
    public function index(){
        $paginaweb = PaginaWebModel::all();
        foreach ($paginaweb as $key => $web) {}

        if (url()->current() == ($web["servidor"]."indicadores/inicio")) {
            return view("paginas.indicadores.inicio");
        }

        if (url()->current() == ($web["servidor"]."indicadores/empresas")) {
            $indicadores = IndicadoresModel::all();
            $meses = MesesModel::all();
            $total_indicadores = count($indicadores);
            $total_meses = count($meses);
            return view("paginas.indicadores.empresas", array("indicadores" => $indicadores, "total_indicadores" => $total_indicadores, "meses" => $meses, "total_meses"=> $total_meses));
        }

        if (url()->current() == ($web["servidor"]."indicadores/recibos")) {
            $indicadores = IndicadoresModel::all();
            $meses = MesesModel::all();
            $total_indicadores = count($indicadores);
            $total_meses = count($meses);
            return view("paginas.indicadores.recibos", array("indicadores" => $indicadores, "total_indicadores" => $total_indicadores, "meses" => $meses, "total_meses"=> $total_meses));
        }

    }

    public function store(Request $request){
        $mes = date("m", time());
        $year = date("Y", time());
        $existe = IndicadoresModel::where("mes", $mes)->where("year", $year)->get();
        /*echo '<pre>'; print_r("Indicador: ".$existe); echo '</pre>';
		return;*/
        if (count($existe) != 0) {
            return $existe[0]["id"];
        }
        $nom_mes = MesesModel::where("codigo_mes", $mes)->get();
        $empresas_activas = EmpresasModel::where("estado_afiliacion_empresa", "activa")->get();
        $empresas_activas = count($empresas_activas);
        $empresas_inactivas = EmpresasModel::where("estado_afiliacion_empresa", "inactiva")->get();
        $empresas_inactivas = count($empresas_inactivas);
        $empresas_nuevas = EmpresasModel::where("estado_afiliacion_empresa", "nueva")->get();
        $empresas_nuevas = count($empresas_nuevas);
        $recibos_generados = PagosModel::where("mes_recibo", $nom_mes[0]["nombre_mes_min"])->get();
        $total_recibos = count($recibos_generados);
        $recibos_pagos = 0;
        $recibos_pendientes = 0;
        $recibos_negociados = 0;
        for ($i=0; $i < $total_recibos; $i++) {
            if ($recibos_generados[$i]["estado"] == "pagado") {
                $recibos_pagos++;
            }
            if ($recibos_generados[$i]["estado"] == "no pago") {
                $recibos_pendientes++;
            }
            if ($recibos_generados[$i]["estado"] == "abonado") {
                $recibos_negociados++;
            }
        }

        $indicador = new IndicadoresModel();

        $indicador->mes = $mes;
        $indicador->year = $year;
        $indicador->empresas_activas = $empresas_activas;
        $indicador->empresas_inactivas = $empresas_inactivas;
        $indicador->empresas_nuevas = $empresas_nuevas;
        $indicador->recibos_generados = $total_recibos;
        $indicador->recibos_pendientes = $recibos_pagos;
        $indicador->recibos_pagos = $recibos_pendientes;
        $indicador->recibos_negociados = $recibos_negociados;

        $indicador->save();

        return "ok";
    }

    public function update($id, Request $request) {
        /*echo '<pre>'; print_r($id); echo '</pre>';
		return;*/
        $mes = date("m", time());
        $year = date("Y", time());
        $existe = IndicadoresModel::where("mes", $mes)->where("year", $year)->get();
        if (count($existe) == 0) {
            return "fallo";
        } else {
            $nom_mes = MesesModel::where("codigo_mes", $mes)->get();
            $empresas_activas = EmpresasModel::where("estado_afiliacion_empresa", "activa")->get();
            $empresas_activas = count($empresas_activas);
            $empresas_inactivas = EmpresasModel::where("estado_afiliacion_empresa", "inactiva")->get();
            $empresas_inactivas = count($empresas_inactivas);
            $empresas_nuevas = EmpresasModel::where("estado_afiliacion_empresa", "nueva")->get();
            $empresas_nuevas = count($empresas_nuevas);
            $recibos_generados = PagosModel::where("mes_recibo", $nom_mes[0]["nombre_mes_min"])->get();
            $total_recibos = count($recibos_generados);
            $recibos_pagos = 0;
            $recibos_pendientes = 0;
            $recibos_negociados = 0;
            for ($i=0; $i < $total_recibos; $i++) {
                if ($recibos_generados[$i]["estado"] == "pagado") {
                    $recibos_pagos++;
                }
                if ($recibos_generados[$i]["estado"] == "no pago") {
                    $recibos_pendientes++;
                }
                if ($recibos_generados[$i]["estado"] == "abonado") {
                    $recibos_negociados++;
                }
            }

            $actualizar = array(
                "empresas_activas" => $empresas_activas,
                "empresas_inactivas" => $empresas_inactivas,
                "empresas_nuevas" => $empresas_nuevas,
                "recibos_generados" => $total_recibos,
                "recibos_pagos" => $recibos_pagos,
                "recibos_pendientes" => $recibos_pendientes,
                "recibos_negociados" => $recibos_negociados
            );
            /*echo '<pre>'; print_r($actualizar); echo '</pre>';
		    return;*/
            $indicadores = IndicadoresModel::where("id", $id)->update($actualizar);
            return "ok";
        }
    }

    public function show($id){

    }
}
