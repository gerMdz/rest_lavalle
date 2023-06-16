<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriaResource;
use App\Http\Resources\PostResource;
use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::Incluye()
            ->filtro()
            ->orden()
            ->obtenerOrPaginar()
        ;

        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $data =    $request->validate([
            'nombre' => 'required|max:255',
            'urlLink' => 'required|max:255|unique:posts',
            'resumen' => 'required|max:255',
            'body' => 'required',
            'categoria_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id'

        ]);
     $data['estado'] = 1;

        $post =  Post::create($data);

        return PostResource::make($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = Post::Incluye()->findOrFail($post->id);

        return PostResource::make($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'urlLink' => 'required|max:255|unique:post,urlLink,'.$post->id,
            'resumen' => 'required',
            'body' => 'required',
            'categoria_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id'
        ]);

        $posts = $post->update($request->all());
        return CategoriaResource::make($posts);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $posts = $post->delete();

        return PostResource::make($posts);

    }
}
