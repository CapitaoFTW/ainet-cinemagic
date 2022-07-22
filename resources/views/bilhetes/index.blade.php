@extends('layouts.app')

@section('title', 'Os Meus Bilhetes')

@section('content')
    <div style="padding-right: 10rem; padding-left:10rem">

        @if (session('alert-msg'))
            @include('message')
        @endif
        @if ($errors->any())
            @include('errors-message')
        @endif

        <h1 class="pb-3">Os Meus Bilhetes</h1>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Filme</th>
                        <th>Sala</th>
                        <th>Lugar</th>
                        <th>Data da Compra</th>
                        <th>Data da Sessão</th>
                        <th>Estado</th>
                        <th class="text-right">Preço</th>
                        <th class="text-center" style="padding-left: 2rem">Recibo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody><?php setlocale(LC_TIME, 'pt_PT'); ?>
                    @foreach ($bilhetes as $bilhete)
                        <tr>
                            <td>{{ $bilhete->id }}</td>
                            <td class="h-100">{{ $bilhete->sessao->filme->titulo }}</td>
                            <td>{{ $bilhete->sessao->sala->nome }}</td>
                            <td>{{ $bilhete->lugar->fila . $bilhete->lugar->posicao }}</td>
                            <td>{{ strftime(date('j, F H:i', strtotime($bilhete->created_at))) }}</td>
                            <td>{{ date('j, F', strtotime($bilhete->sessao->data)) . date(' H:i', strtotime($bilhete->sessao->horario_inicio)) }}
                            </td>
                            <td>{{ $bilhete->isUsado() ? 'Usado' : 'Não Usado' }}</td>
                            <td class="text-right">
                                {{ round($bilhete->preco_sem_iva + ($bilhete->preco_sem_iva * 13) / 100, 2) }} €</td>
                            <td class="text-right">
                                <a href="" class="btn btn-success">Download</a>
                            </td>
                            <td class="text-right">
                                <a href="" class="btn btn-secondary">Detalhes</a>
                            </td>
                        </tr>
                        <tr class=table-secondary>
                            <!-- route('bilhete.show', ['bilhete' => $bilhete]) -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row justify-content-center pt-4">
            {{ $bilhetes->withQueryString()->onEachSide(1)->links() }}
        </div>
    </div>
@endsection
