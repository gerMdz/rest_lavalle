<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Etiqueta extends Model
{
    use HasFactory;
use ApiTrait;

    protected $table = 'tags';

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
