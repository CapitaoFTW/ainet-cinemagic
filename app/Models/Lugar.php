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

    public function isOcupado($sessao_id)
    {
        return $this->bilhetes()->where('sessao_id', $sessao_id)->count() > 0;
    }

    public function isNoCarrinho()
    {
        $carrinho = session('carrinho');
        if (isset($carrinho))
            foreach ($carrinho as $row)
                if ($row['lugar_id'] == $this->id)
                    return true;
        return false;
    }

    public static function lugaresPorFila($lugares)
    {
        $lugares_por_fila = [];
        foreach ($lugares as $lugar) {
            $lugares_por_fila[$lugar->fila][] = $lugar;
        }
        return $lugares_por_fila;
    }
}
