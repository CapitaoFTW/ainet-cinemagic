@extends('layouts.app')

@section('title', 'Carrinho de Compras')

@section('content')
    <div class="container">

        @if (session('alert-msg'))
            @include('message')
        @endif
        @if ($errors->any())
            @include('errors-message')
        @endif

        <h1 class="text-center">CARRINHO DE COMPRAS</h1>
        @if (session('carrinho'))
            <div class="pt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Filme</th>
                            <th>Lugar</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th class="text-right">Preço</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        @foreach ($carrinho as $row => $bilhete)
                            <tr>
                                <td>{{ $bilhete['filme'] }}</td>
                                <td>{{ $bilhete['lugar'] }}</td>
                                <td>{{ $bilhete['data'] }}</td>
                                <td>{{ $bilhete['hora'] }}</td>
                                <td class="text-right">{{ $bilhete['preco'] }} €</td>
                                <td class="text-right" style="width:6rem;">
                                    <form method="post" action="{{ route('carrinho.destroy_bilhete', ['row' => $row]) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Apagar</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $total += $bilhete['preco']; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row justify-content-between">
                <div class="col-6 pt-2">
                    <h2>TOTAL: {{ round($total, 2) }} €</h2>
                </div>
                <div class="col-sm-4" style="padding-left: 6rem">
                    <form method="post" action="{{ route('carrinho.destroy') }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-lg">Remover Todos os Bilhetes</button>
                    </form>
                </div>
                @auth
                    @if (session('carrinho'))
                        <div class="col-xs-2 pr-3">
                            <form method="post" action="{{ route('recibos.create') }}">
                                @csrf
                                <button class="btn btn-primary btn-lg">Confirmar Recibo</button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        @else
            <div class="row justify-content-center" style="padding-top: 12rem; padding-bottom: 12rem">
                <div class="alert alert-danger alert-dismissible fade show text-right" role="alert">
                    <h2 class="pt-2 pr-1 pl-5">O CARRINHO AINDA ESTÁ VAZIO!</h2>
                </div>
            </div>
        @endif
    </div>
@endsection
