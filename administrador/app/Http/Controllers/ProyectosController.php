<?php

namespace App\Http\Controllers;

use App\Http\Requests\Proyectos\StoreRequest;
use App\Http\Requests\Proyectos\UpdateRequest;
use App\ProyectosModel;
use App\SectorEmpresaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = DB::table('proyectos')
            ->join('sector_empresa', 'proyectos.sector_id', '=', 'sector_empresa.id_sector')
            ->select('proyectos.*', 'sector_empresa.nombre_sector')
            ->get();
        //$proyectos = json_decode(json_encode($proyectos));
        return view('paginas.proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyecto = new ProyectosModel();
        $sectores = SectorEmpresaModel::pluck('id_sector', 'nombre_sector');
        return view('paginas.proyectos.create', compact('proyecto', 'sectores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        /**************** MOVER IMAGEN ****************/
        if (isset($data['imagen_proyecto'])) {
            $data['imagen_proyecto'] = $filename = time().'.'.$data['imagen_proyecto']->extension();
            $request->imagen_proyecto->move(public_path('vistas/images/proyecto'), $filename);
        }
        /*********************************************/
        ProyectosModel::create($data);
        return to_route('proyectos.index')->with('ok-guardado', '');//redirecciona al index
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProyectosModel  $proyectosModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProyectosModel $proyectosModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProyectosModel  $proyectosModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   //print_r($_GET['id']);
        $proyecto = DB::table('proyectos')
        ->join('sector_empresa', 'proyectos.sector_id', '=', 'sector_empresa.id_sector')
        ->select('proyectos.*', 'sector_empresa.nombre_sector')
        ->where('id', '=', $id)
        ->get();
        $proyecto = json_decode(json_encode($proyecto));
        $proyecto = $proyecto[0];
        //dd($proyecto);
        $sectores = SectorEmpresaModel::pluck('id_sector', 'nombre_sector');
        return view('paginas.proyectos.edit', compact('proyecto', 'sectores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProyectosModel  $proyectosModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $proyecto_id)
    {
        $data = $request->validated();

        if (isset($data['imagen_proyecto'])) {
            $data['imagen_proyecto'] = $filename = time().'.'.$data['imagen_proyecto']->extension();
            $request->imagen_proyecto->move(public_path('vistas/images/proyecto'), $filename);

            $imagen_anterior = ProyectosModel::where('id', $proyecto_id)->get('imagen_proyecto');
            $imagen_anterior = json_decode(json_encode($imagen_anterior));
            $imagen_anterior = $imagen_anterior[0]->imagen_proyecto;
            unlink('vistas/images/proyecto/'.$imagen_anterior);
        }

        ProyectosModel::where('id', $proyecto_id)->update($data);
        return to_route('proyectos.index')->with('ok-edit', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProyectosModel  $proyectosModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $validar = ProyectosModel::where("id", $id)->get();
        if (!empty($validar)) {
            $proyectos = ProyectosModel::where("id", $validar[0]["id"])->delete();
            return "ok";
        } else {
            return redirect("/proyectos")->with("no-borrar", "");
        }
    }
}
