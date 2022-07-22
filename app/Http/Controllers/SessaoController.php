<?php

namespace App\Http\Controllers;

use App\Models\Sessao;
use App\Models\Lugar;
use Illuminate\Http\Request;

class SessaoController extends Controller
{
    public function comprar_bilhete(Sessao $sessao)
    {
        $sala = $sessao->sala;
        $lugares = $sala->lugares;

        $filas = Lugar::lugaresPorFila($lugares);

        return view('sessoes.comprar_bilhete', compact('sessao', 'sala', 'filas'));
    }
}
