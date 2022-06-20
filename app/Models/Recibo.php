<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nif',
        'preco_total_sem_iva',
        'iva',
        'preco_total_com_iva',
        'nome_cliente',
        'tipo_pagamento',
        'ref_pagamento',
    ];

    public function Cliente() {
        return $this -> hasOne(Cliente:: class);
    }

    public function Bilhete() {
        return $this -> hasMany(Bilhete:: class);
    }
}
