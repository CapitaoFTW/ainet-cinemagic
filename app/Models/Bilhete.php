<?php

namespace App\Models;

use COM;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Ui\Presets\React;

class Bilhete extends Model
{
    use HasFactory;

    protected $fillable = [
        'recibo_id',
        'cliente_id',
        'sessao_id',
        'lugar_id',
        'preco_sem_iva',
        'estado',
        'bilhete_pdf_url',
        'bilhete_qrcode_url'
    ];

    public function recibo()
    {
        return $this->belongsTo(Recibo::class, 'recibo_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function sessao()
    {
        return $this->belongsTo(Sessao::class, 'sessao_id');
    }

    public function lugar()
    {
        return $this->belongsTo(Lugar::class, 'lugar_id');
    }
}
