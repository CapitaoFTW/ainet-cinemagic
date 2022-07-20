<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Filme;
use App\Models\Sessao;
use Illuminate\Http\Request;
use App\Http\Requests\FilmePost;
use Illuminate\Support\Facades\Storage;

class FilmeController extends Controller
{
    public function index(Request $request)
    {
        $genero = $request->genero ?? '';
        $nome = $request->nome ?? '';

        $qry = Filme::with('sessoes')
            ->whereRelation('sessoes', 'data', '>=', date('Y-m-d'))
            ->whereRelation('sessoes', 'horario_inicio', '>=', date('H:i:s'));

        if ($genero) {
            $qry->where('genero_code', $genero);
        }

        if ($nome) {
            $qry
                ->where('titulo', 'like', "%$nome%")
                ->orWhere('sumario', 'like', "%$nome%");
        }

        $filmes = $qry->paginate(100);

        //dd($filmes);

        $generos = Genero::pluck('nome', 'code');

        return view('filmes.index', compact('filmes', 'nome', 'genero', 'generos'));
    }

    public function show($titulo)
    {
        $filme = Filme::select('*')
            ->where(strtolower('titulo'), $titulo)
            ->first();

        return view('filmes.show', compact('filme'));
    }
}
