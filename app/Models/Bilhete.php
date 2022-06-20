<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilhete extends Model
{
    use HasFactory;

    public function Recibo() {
        return $this -> hasOne(Recibo:: class);
    }

    public function Sessao() {
        return $this -> belongsTo(Sessao:: class, 'id', 'sessao_id');
    }
}
