<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function index(Request $request)
    {
        $genero = $request->genero ?? '';
        $nome = $request->nome ?? '';

        $qry = Filme::query()->with('sessoes')
            ->whereRelation('sessoes', 'data', '=', now()->format('Y-m-d'))
            ->whereRelation('sessoes', 'horario_inicio', '>=', now()->subMinutes(5)->format('H:i:s'))
            ->orWhereRelation('sessoes', 'data', '>', now()->format('Y-m-d'));

        if ($genero) {
            $qry->whereHas('genero', function ($query) use ($genero) {
                $query->where('genero_code', $genero);
            });
        }

        if ($nome) {
            $qry->where(function ($query) use ($nome) {
                $query->where('titulo', 'like', "%$nome%")
                    ->orWhere('sumario', 'like', "%$nome%");
            });
        }

        $filmes = $qry->orderBy('titulo', 'asc')->paginate(100);

        $generos = Genero::whereHas('filmes', function ($query) {
            $query->whereHas('sessoes', function ($query) {
                $query->where('data', '>', now()->format('Y-m-d'))
                    ->orWhere(function ($query) {
                        $query->where('data', now()->format('Y-m-d'))
                            ->where('horario_inicio', '>=', now()->subMinutes(5)->format('H:i'));
                    });
            });
        })->pluck('nome', 'code');

        return view('filmes', compact('filmes', 'nome', 'genero', 'generos'));
    }

    public function show($titulo)
    {
        $filme = Filme::select('*')
            ->where(strtolower('titulo'), $titulo)
            ->first();

        return view('filmes.show', compact('filme'));
    }
}
