<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'nombre',
        'urlLink'
    ];

    protected $permiteIncluye = ['posts', ['posts.usuario']];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }


    public function scopeIncluye(Builder $qb)
    {
        if (empty($this->permiteIncluye) || empty(request('incluye'))) {
            return;
        }

        $relaciones = explode(',', request('incluye'));
        $incluyePermitidos = collect($this->permiteIncluye);
        foreach ($relaciones as $key => $value){
            if(!$incluyePermitidos->contains($value)){
                unset($relaciones[$key]);
            }
        }

        $qb->with($relaciones);


    }
}
