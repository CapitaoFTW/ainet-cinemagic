<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use SoftDeletes;

class Cliente extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'nif',
        'tipo_pagamento',
        'ref_pagamento',
    ];

    public function user() {
        return $this -> belongsTo(User:: class,'id');
    }

    public function recibos() {
        return $this -> hasMany(Recibo:: class, 'cliente_id');
    }

    public function bilhetes() {
        return $this -> hasMany(Bilhete:: class, 'cliente_id');
    }
}
