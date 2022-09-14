<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpresasModel;
use App\RepresentanteEmpresaModel;
use App\EmpleadosModel;
use App\PaginaWebModel;
use Illuminate\Support\Facades\DB;

class DocumentosController extends Controller
{
    public function index()
    {

        $paginaweb = PaginaWebModel::all();
        foreach ($paginaweb as $key => $web) {
        }
        $servidor = $web["servidor"];
        if ($web["servidor"] . "documentos/empresas" == url()->current()) {
            $join = DB::table('empresas')->join('representante_empresa', 'empresas.cc_rprt_legal', '=', 'representante_empresa.cc_rprt_legal')->select('empresas.id_empresa', 'empresas.nit_empresa', 'empresas.razon_social', 'representante_empresa.cc_rprt_legal', 'representante_empresa.primer_nombre', 'representante_empresa.segundo_nombre', 'representante_empresa.primer_apellido', 'representante_empresa.segundo_apellido')->get();
            if (request()->ajax()) {
                return datatables()->of($join)
                    ->addColumn('nombre', function ($data) {
                        $nombre = $data->primer_apellido . ' ' . $data->segundo_apellido . ' ' . $data->primer_nombre . ' ' . $data->segundo_nombre;
                        return $nombre;
                    })

                    ->addColumn('procedimientos', function ($data) {
                        $procedimientos = '
                    <div class="text-center">
                    	<div class="btn-group">
	                        <a href="' . url()->current() . '/' . $data->id_empresa . '" title="Ver documentación" class="btn btn-primary btn-sm verDocumentos">
	                            <i class="fas fa-file-pdf text-white"></i>
	                             Documentación
	                        <a>
	                    </div>
                    </div>
                    ';

                        return $procedimientos;
                    })

                    ->rawColumns(['nombre', 'procedimientos'])
                    ->make(true);
            }

            return view("paginas.documentos.empresas", array("servidor" => $servidor));
        }

        if ($web["servidor"] . "documentos/empleados" == url()->current()) {
            $join = DB::table('empleados')->join('roles', 'empleados.id_rol', '=', 'roles.id')->select('empleados.id', 'empleados.num_documento', 'empleados.primer_nombre', 'empleados.segundo_nombre', 'empleados.primer_apellido', 'empleados.segundo_apellido', 'empleados.id_rol', 'roles.id', 'roles.rol')->get();
            if (request()->ajax()) {
                return datatables()->of($join)
                    ->addColumn('nombre_completo', function ($data) {
                        $nombre_completo = $data->primer_apellido . ' ' . $data->segundo_apellido . ' ' . $data->primer_nombre . ' ' . $data->segundo_nombre;
                        return $nombre_completo;
                    })

                    ->addColumn('procedimientos', function ($data) {
                        $procedimientos = '
                    <div class="text-center">
                    	<div class="btn-group">
	                        <a href="' . url()->current() . '/' . $data->num_documento . '" title="Ver documentación" class="btn btn-primary btn-sm verDocumentos">
	                            <i class="fas fa-file-pdf text-white"></i>
	                             Documentación
	                        <a>
	                    </div>
                    </div>
                    ';

                        return $procedimientos;
                    })

                    ->rawColumns(['nombre', 'procedimientos'])
                    ->make(true);
            }

            return view("paginas.documentos.empleados", array("servidor" => $servidor));
        }
    }

    public function show($id)
    {
        $paginaweb = PaginaWebModel::all();
        foreach ($paginaweb as $key => $web) {
        }
        $servidor = $web["servidor"];

        if ($web["servidor"] . "documentos/empresas/" . $id == url()->current()) {
            $empresa = EmpresasModel::where("id_empresa", $id)->get();

            if (count($empresa) != 0) {
                $representante_empresa = RepresentanteEmpresaModel::where("cc_rprt_legal", $empresa[0]["cc_rprt_legal"])->get();

                $pdf = strpos($representante_empresa[0]["foto_cedula_rprt"], "pdf");
                if ($pdf !== false) {
                    $tipo_cedula = "pdf";
                } else {
                    $tipo_cedula = "imagen";
                }

                return view("paginas.documentos.empresas", array("status" => 200, "empresa" => $empresa, "representante_empresa" => $representante_empresa, "servidor" => $servidor, "tipo_cedula" => $tipo_cedula));
            } else {

                return view("paginas.documentos.empresas", array("status" => 404, "servidor" => $servidor));
            }
        }

        if ($web["servidor"] . "documentos/empleados/" . $id == url()->current()) {
            $empleado = EmpleadosModel::where("num_documento", $id)->get();
            if (count($empleado) != 0) {
                $pdf = strpos($empleado[0]["cedula"], "pdf");
                if ($pdf !== false) {
                    $tipo_cedula = "pdf";
                } else {
                    $tipo_cedula = "imagen";
                }
                return view("paginas.documentos.empleados", array("status" => 200, "servidor" => $servidor, "empleado" => $empleado, "tipo_cedula" => $tipo_cedula));
            } else {
                return view("paginas.documentos.empleados", array("status" => 404, "servidor" => $servidor));
            }
        }
    }
}
