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

        <h1>Carrinho de Compras</h1>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Qtd.</th>
                        <th>Medicamento</th>
                        <th class="text-right">Preço Un.</th>
                        <th class="text-right">Subtotal</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    @foreach ($carrinho as $row)
                        <tr>
                            <td>{{ $row['qtd'] }}</td>
                            <td>{{ $row['nome'] }}</td>
                            <td class="text-right">{{ $row['preco_un'] }} €</td>
                            <td class="text-right">{{ $row['subtotal'] }} €</td>
                            <td class="text-right" style="width:5rem;">
                                <form method="post" action="{{ route('carrinho.update_medicamento', $row['id']) }}">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-info" name="quantidade" value="1">Mais</button>
                                </form>
                            </td>
                            <td class="text-right" style="width:5rem;">
                                <form method="post" action="{{ route('carrinho.update_medicamento', $row['id']) }}">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-secondary" name="quantidade" value="-1">Menos</button>
                                </form>
                            </td>
                            <td class="text-right" style="width:6rem;">
                                <form method="post" action="{{ route('carrinho.destroy_medicamento', $row['id']) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Apagar</button>
                                </form>
                            </td>
                        </tr>
                        <?php $total += $row['subtotal']; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-7">
                <h2>Total: {{ $total }} €</h2>
            </div>
            @auth
                @if (session()->get('carrinho') != [])
                    <div class="text-right col-5">
                        <form method="post" action="{{ route('receita.create') }}">
                            @csrf
                            <button class="btn btn-primary btn-lg">Confirmar Receita</button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>
@endsection
