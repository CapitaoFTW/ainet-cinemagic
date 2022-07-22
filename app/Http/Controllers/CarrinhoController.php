<?php

namespace App\Http\Controllers;

use App\Models\Sessao;
use App\Models\Lugar;
use App\Models\Bilhete;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function index()
    {
        return view('carrinho.index')
            ->with('pageTitle', 'Carrinho de Compras')
            ->with('carrinho', session('carrinho') ?? []);
    }

    public function store_bilhete(Request $request, Sessao $sessao, Lugar $lugar)
    {
        $carrinho = $request->session()->get('carrinho', []);

        // If a seat is already occupied, don't add it to the cart and redirect back with an error
        if ($lugar->isOcupado($sessao->id))
            return back()
                ->with('alert-msg', 'Esse lugar já se encontra ocupado!')
                ->with('alert-type', 'danger');

        $carrinho[] = [
            'id' => $sessao->id,
            'filme' => $sessao->filme->titulo,
            'data' => date('j F', strtotime($sessao->data)),
            'hora' => date('H:i', strtotime($sessao->horario_inicio)),
            'lugar_id' => $lugar->id,
            'lugar' => $lugar->fila . $lugar->posicao,
            'preco' => 8.35,
        ];

        $request->session()->put('carrinho', $carrinho);

        return back()
            ->with('alert-msg', 'Foi adicionado o bilhete ao carrinho!')
            ->with('alert-type', 'success');
    }

    public function destroy_bilhete(Request $request, $row)
    {
        $carrinho = $request->session()->get('carrinho', []);

        unset($carrinho[$row]);
        $request->session()->put('carrinho', $carrinho);

        return back()
            ->with('alert-msg', 'Foi removido um bilhete do carrinho!')
            ->with('alert-type', 'success');
    }

    /**
     * Limpar o carrinho
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->get('carrinho', []);
        session()->forget('carrinho');

        return back()
            ->with('alert-msg', 'Todos os bilhetes do carrinho foram removidos!')
            ->with('alert-type', 'success');
    }
}
