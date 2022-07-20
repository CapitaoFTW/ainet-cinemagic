<?php

namespace App\Http\Controllers;

use App\Models\Bilhete;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function index()
    {
        if (!session()->has('carrinho'))
        return redirect()->route('bilhetes.index');

        return view('carrinho.index')
            ->with('pageTitle', 'Carrinho de Compras')
            ->with('carrinho', session('carrinho') ?? []);
    }

    public function store_bilhete(Request $request, Bilhete $bilhete)
    {
        $carrinho = $request->session()->get('carrinho', []);
        $qtdTotal = session('qtdTotal', 0);

        $qtd = ($carrinho[$bilhete->id]['qtd'] ?? 0) + 1;

        ++$qtdTotal;
        session(['qtdTotal' => $qtdTotal]);

        $carrinho[$bilhete->id] = [
            'id' => $bilhete->id,
            'qtd' => $qtd,
            'nome' => $bilhete->nome,
            'preco_un' => $bilhete->preco_un,
            'subtotal' => $bilhete->preco_un * $qtd,
        ];

        $request->session()->put('carrinho', $carrinho);

        return back()
            ->with('alert-msg', 'Foi adicionado o bilhete "' . $bilhete->nome . '" ao carrinho!')
            ->with('alert-type', 'success');
    }

    public function update_bilhete(Request $request, Bilhete $bilhete)
    {
        $carrinho = $request->session()->get('carrinho', []);
        $qtdTotal = session('qtdTotal', 0);

        $qtd = $carrinho[$bilhete->id]['qtd'] ?? 0;
        $qtd += $request->quantidade;

        if ($request->quantidade < 0) {
            $msg = 'Foi removido ' . -$request->quantidade . ' bilhete "' . $bilhete->nome . '" ao carrinho!';
            --$qtdTotal;
        } elseif ($request->quantidade > 0) {
            $msg = 'Foi adicionado ' . $request->quantidade . ' bilhete "' . $bilhete->nome . '" do carrinho!';
            ++$qtdTotal;
        }

        session(['qtdTotal' => $qtdTotal]);

        if ($qtd <= 0) {
            unset($carrinho[$bilhete->id]);
            $msg = 'Foi removido o bilhete "' . $bilhete->nome . '" do carrinho!';
        } else {
            $carrinho[$bilhete->id] = [
                'id' => $bilhete->id,
                'qtd' => $qtd,
                'nome' => $bilhete->nome,
                'preco_un' => $bilhete->preco_un,
                'subtotal' => $bilhete->preco_un * $qtd,
            ];
        }

        $request->session()->put('carrinho', $carrinho);

        if (session()->get('carrinho') == [])
            return redirect()->route('bilhetes.index')
                ->with('alert-msg', $msg)
                ->with('alert-type', 'success');

        return back()
            ->with('alert-msg', $msg)
            ->with('alert-type', 'success');
    }

    public function destroy_bilhete(Request $request, Bilhete $bilhete)
    {
        $carrinho = $request->session()->get('carrinho', []);

        $qtdTotal = session('qtdTotal', 0);
        $qtdTotal -= $carrinho[$bilhete->id]['qtd'];
        session(['qtdTotal' => $qtdTotal]);

        unset($carrinho[$bilhete->id]);
        $request->session()->put('carrinho', $carrinho);

        if (session()->get('carrinho') == [])
            return redirect()->route('bilhetes.index')
                ->with('alert-msg', 'Foi removido o bilhete "' . $bilhete->nome . '" do carrinho!')
                ->with('alert-type', 'success');

        return back()
            ->with('alert-msg', 'Foi removido o bilhete "' . $bilhete->nome . '" do carrinho!')
            ->with('alert-type', 'success');
    }
}
