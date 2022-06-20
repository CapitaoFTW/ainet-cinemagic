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

    public function User() {
        return $this -> belongsTo(User:: class,'id','id');
    }

    public function Recibo() {
        return $this -> hasMany(Recibo:: class);
    }

    public function Bilhete() {
        return $this -> hasMany(Bilhete:: class);
    }
}
