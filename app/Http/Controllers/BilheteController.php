<?php

namespace App\Http\Controllers;

use App\Models\Recibo;
use App\Models\Bilhete;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BilheteController extends Controller
{
    public function index()
    {
        $bilhetes = Bilhete::query()->where('cliente_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('bilhetes.index', compact('bilhetes'));
    }

    public function show(Bilhete $bilhete)
    {
        return view('recibos.show', compact('bilhete'));
    }
}
