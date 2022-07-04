<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use SoftDeletes;

class Lugar extends Model
{
    use HasFactory;

	protected $table = "Lugares";
    public $timestamps = false;

    protected $fillable = [
        'sala_id',
        'fila',
        'posicao',
    ];

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'sala_id');
    }

    public function bilhetes()
    {
        return $this->hasMany(Bilhete::class, 'lugar_id');
    }

}
