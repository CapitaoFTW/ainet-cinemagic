<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;
use App\Http\Requests\ClientePost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*public function index(Cliente $cliente) {
        $cliente->user = Auth::user();



        return view('clientes.index')
            ->withGenero($genero)
            ->withAno($ano)
            ->withGeneros($listaGeneros)
            ->withCartaz($cartaz_url);
    }*/
}