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

    public function index() {
        $user = Auth::user();
        if ($user->tipo == 'C')
            $cliente = Cliente::select('*')->where('id', $user->id)->first();
        else
            return view('home');

        return view('clientes.perfil')
            ->with('cliente', $cliente);
    }

    public function update(ClientePost $request)
    {
        $validated = $request->validated();

        $cliente = Cliente::find(Auth::user()->id);

        if ($request->name)
            $cliente->user->name = $validated['name'];

        if ($request->email) {
            $cliente->user->email = $validated['email'];
           // $user->sendEmailVerificationNotification();
            //$user->email_verified_at = null;
        }

        if ($request->nif)
            $cliente->nif = $validated['nif'];

        if ($request->tipo_pagamento)
            $cliente->tipo_pagamento = $validated['tipo_pagamento'];

        /*if ($request->hasFile('profile_pic')) {
            $user->foto_url ? Storage::delete('public/fotos/' . $user->foto_url) : null;
            $path = $request->profile_pic->store('public/fotos');
            $user->foto_url = basename($path);
        }*/

        // $user->password = Hash::make($request->password);
        $cliente->save();

        return view('clientes.perfil');
    }
}
