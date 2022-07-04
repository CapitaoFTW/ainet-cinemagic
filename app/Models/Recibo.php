<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;

    protected $dates = ['data', 'updated_at', 'created_at'];

    protected $fillable = [
        'nif',
        'preco_total_sem_iva',
        'iva',
        'preco_total_com_iva',
        'nome_cliente',
        'tipo_pagamento',
        'ref_pagamento',
    ];

    public function cliente() {
        return $this -> belongsTo(Cliente:: class, 'cliente_id');
    }

    public function bilhetes() {
        return $this -> hasMany(Bilhete:: class, 'recibo_id');
    }
}
