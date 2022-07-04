<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'genero_code',
        'ano',
        'cartaz_url',
        'sumario',
        'trailer_url',
    ];

    public function sessoes()
    {
        return $this->hasMany(Sessao::class, 'filme_id');
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'genero_code', 'code');
    }
}
