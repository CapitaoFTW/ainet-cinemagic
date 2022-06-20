<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Filme;
use Illuminate\Http\Request;
use App\Http\Requests\FilmePost;
use Illuminate\Support\Facades\Storage;

class FilmeController extends Controller {
    public function index() {
        $filmes = Filme::all();

        return view('filmes.index',compact('filmes'));
    }

    public function show($titulo) {
        $filme = Filme::select('*')->where(strtolower('titulo'), $titulo)->first();

        return view('filmes.show')
            ->with('filme', $filme);
    }
}
