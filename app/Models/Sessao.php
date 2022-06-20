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
    ];

    public function Bilhete() {
        return $this -> hasMany(Bilhete:: class, 'sessao_id','id');
    }

    public function Filme() {
        return $this -> hasOne(Filme:: class, 'id','filme_id');
    }

    public function Sala() {
        return $this -> hasOne(Sala:: class, 'id','sala_id');
    }
}
