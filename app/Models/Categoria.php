<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;
    use ApiTrait;

    protected $table = 'categories';
    protected $fillable = [
        'nombre',
        'urlLink'
    ];

    protected $permiteIncluye = ['posts', ['posts.user']];
    protected $permiteFiltro = ['id', 'nombre', 'urlLink'];
    protected $permiteOrdenar = ['id', 'nombre', 'urlLink'];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }



}
