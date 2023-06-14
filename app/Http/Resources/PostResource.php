<?php

namespace App\Http\Resources;

use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        dd($this->user_id);
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'urlLink' => $this->urlLink,
            'resumen' => $this->resumen,
            'body' => $this->body,
            'estado' => $this->estado ==1? 'Borrador': 'Publicado',
            'usuario' => UserResource::make($this->whenLoaded('user')),
            'catagoria' => CategoriaResource::make($this->whenLoaded('categories'))

        ];
    }
}
