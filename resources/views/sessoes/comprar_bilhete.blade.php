@extends('layouts.app')

@section('title', 'Comprar Bilhete')

@section('content')
    @if (session('alert-msg'))
        @include('message')
    @endif
    @if ($errors->any())
        @include('errors-message')
    @endif

    <h1 class="text-center pb-3">ESCOLHA UM LUGAR</h1>

    @foreach ($filas as $fila => $lugares)
        <div class="row pr-1 pt-1 justify-content-center">
            <div class="text-right pr-3 pt-3 mr-2">
                {{ $fila }}</button>
            </div>
            @foreach ($lugares as $lugar)
                <div class="col-xs-1 p-2">
                    @if ($lugar->isOcupado($sessao->id))
                        <button class="btn btn-danger">{{ $lugar->posicao }}</button>
                    @elseif ($lugar->isNoCarrinho())
                        <button class="btn btn-warning">{{ $lugar->posicao }}</button>
                    @else
                        <form method="POST" action="{{ route('carrinho.store_bilhete', [$sessao, $lugar]) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">{{ $lugar->posicao }}</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
