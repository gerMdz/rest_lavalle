<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::Incluye()
            ->filtro()
            ->orden()
            ->obtenerOrPaginar()
            ;

        return CategoriaResource::collection($categorias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'urlLink' => 'required|max:255|unique:categories'
        ]);

        $categ =  Categoria::create($request->all());
        return CategoriaResource::make($categ);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {

        $categ = Categoria::Incluye()->findOrFail($categoria->id);

        return CategoriaResource::make($categ);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria): Categoria
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'urlLink' => 'required|max:255|unique:categories,urlLink,'.$categoria->id,
        ]);

         $categ = $categoria->update($request->all());
        return CategoriaResource::make($categ);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categ = $categoria->delete();

        return CategoriaResource::make($categ);

    }
}
