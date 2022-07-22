<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class Recibo extends Model
{
    use HasFactory;

    protected $dates = ['data', 'updated_at', 'created_at'];

    protected $fillable = [
        'nif',
        'cliente_id',
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

    public function criarPdf()
    {
        $data = [
            'user' => Auth::user(),
            'recibo' => $this,
            'bilhetes' => $this->bilhetes,
            'tipo_pagamento' => $this->tipo_pagamento,
            'ref_pagamento' => $this->ref_pagamento,
        ];

        $pdf = PDF::loadView('pdf.invoice', $data);

        $invoiceFileName =  uniqid(rand(), true) . '.pdf';

        Storage::put('pdf_recibos/' . $invoiceFileName, $pdf->output());
        $data['recibo']->recibo_pdf_url = $invoiceFileName;
        $data['recibo']->save();
    }
}
