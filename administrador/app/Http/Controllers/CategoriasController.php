<?php

namespace App\Http\Controllers;

use App\CategoriasModel;
use App\Http\Requests\Categorias\StoreRequest;
use App\Http\Requests\Categorias\UpdateRequest;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = CategoriasModel::get();
        return view('paginas.pagina_web.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = new CategoriasModel();
        return view('paginas.pagina_web.categorias.create', compact('categoria'));
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
        CategoriasModel::create($data);
        return to_route('categorias.index')->with('ok-guardado', '');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriasModel  $categoriasModel
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriasModel $categoriasModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriasModel  $categoriasModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id_categoria)
    {
        $categoria = CategoriasModel::where('id_categoria', $id_categoria)->get();
        $categoria = json_decode(json_encode($categoria));
        $categoria = $categoria[0];
        return view('paginas.pagina_web.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriasModel  $categoriasModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id_categoria)
    {
        $data = $request->validated();

        CategoriasModel::where('id_categoria', $id_categoria)->update($data);
        return to_route('categorias.index')->with('ok-edit', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriasModel  $categoriasModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_categoria)
    {
        $validar = CategoriasModel::where("id_categoria", $id_categoria)->get();
        if (!empty($validar)) {
            $categorias = CategoriasModel::where("id_categoria", $validar[0]["id_categoria"])->delete();
            return "ok";
        } else {
            return redirect("/pagina_web/categorias")->with("no-borrar", "");
        }
    }
}
