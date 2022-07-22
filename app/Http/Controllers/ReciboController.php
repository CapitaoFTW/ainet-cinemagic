<?php

namespace App\Http\Controllers;

use App\Models\Recibo;
use App\Models\Bilhete;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReciboController extends Controller
{
    public function create(Request $request)
    {
        $recibo = new Recibo;

        $carrinho = $request->session()->get('carrinho', []);
        $precoTotal = 8.35 * count($carrinho);
        $precoTotalIVA = (round(8.35 + (8.35 * 13) / 100, 2)) * count($carrinho);
        $user = Auth::user();

        $recibo->cliente_id = $user->id;
        $recibo->data = date('Y-m-d');
        $recibo->preco_total_sem_iva = $precoTotal;
        $recibo->iva = 13;
        $recibo->preco_total_com_iva = $precoTotalIVA;
        $recibo->nif = $user->cliente->nif;
        $recibo->nome_cliente = $user->name;
        $recibo->tipo_pagamento = $user->cliente->tipo_pagamento;
        $recibo->ref_pagamento = $user->cliente->ref_pagamento;
        $recibo->save();

        $newBilhetes = [];

        foreach($carrinho as $row) {
            $newBilhetes = new Bilhete;

            $newBilhetes->recibo_id = $recibo->id;
            $newBilhetes->cliente_id = $recibo->cliente_id;
            $newBilhetes->sessao_id = $row['id'];
            $newBilhetes->lugar_id = $row['lugar_id'];
            $newBilhetes->preco_sem_iva = $row['preco'];
            $newBilhetes->estado = 'não usado';
            $newBilhetes->save();
        }

        $recibo->criarPdf();

        //TODO
        // enviar email com o recibo
        $user->notify(new InvoicePaid($recibo));

        session()->forget('carrinho');

        return redirect()->route('recibo.show', compact('recibo'))
            ->with('alert-msg', 'Foi criada o recibo #' . $recibo->id)
            ->with('alert-type', 'success');
    }

    public function show(Recibo $recibo)
    {
        $bilhetes = Bilhete::where('recibo_id', $recibo->id)->get();
        return view('recibos.show', compact('recibo', 'bilhetes'));
    }
}
