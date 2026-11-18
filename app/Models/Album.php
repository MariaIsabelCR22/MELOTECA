<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Album extends Model
{
    protected $fillable = [
        'user_id',
        'nombre',
        'artista',
        'genero',
        'anio_lanzamiento',
        'formato',
        'descripcion',
        'portada',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}