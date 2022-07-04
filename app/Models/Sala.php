<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use SoftDeletes;

class Sala extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nome',
    ];

    public function sessoes()
    {
        return $this->hasMany(Sessao::class, 'sala_id');
    }

    public function lugares()
    {
        return $this->hasMany(Lugar::class, 'sala_id');
    }

}
