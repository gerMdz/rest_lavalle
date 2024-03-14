<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model
{
    use HasFactory;
    use ApiTrait;

    const DRAFT = 1;
    const PUBLISHED = 2;

    protected $fillable = [
        'nombre',
        'urlLink',
        'resumen',
        'body',
        'estado',
        'categoria_id',
        'user_id'
    ];


    // Relación uno a 'muchos' inversa.
    public function usuario(): BelongsTo
    {
        // Relación inversa con HasMay
        return $this->belongsTo(User::class);
    }

    public function user(): BelongsTo
    {
        // Relación inversa con HasMay
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function categoria(): BelongsTo
    {
        // Relación inversa con HasMay
        return $this->belongsTo(Categoria::class);
    }

    // Muchos a muchos BelongsToMany

    public function etiquetas(): BelongsToMany
    {
        return $this->belongsToMany(Etiqueta::class);
    }

    // Relación uno a 'muchos' polimórficas

    /**
     * @return MorphToMany
     */
    public function imagenes(): MorphToMany
    {
        return $this->morphToMany(Imagen::class, 'imageable');
    }
}
