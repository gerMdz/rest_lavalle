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

        return Categoria::create($request->all());
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

         $categoria->update($request->all());
         return $categoria;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return $categoria;

    }
}
