<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{
    use HasFactory;

	protected $table = "Sessoes";

    protected $fillable = [
        'filme_id',
        'sala_id',
        'data',
        'horario_inicio',
    ];

    public function bilhetes() {
        return $this -> hasMany(Bilhete:: class, 'sessao_id');
    }

    public function filme() {
        return $this -> belongsTo(Filme:: class, 'filme_id');
    }

    public function sala() {
        return $this -> belongsTo(Sala:: class, 'sala_id');
    }
}
