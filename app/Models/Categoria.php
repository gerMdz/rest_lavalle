<?php

namespace App\Models;

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

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
