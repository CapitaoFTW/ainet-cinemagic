@extends('layouts.app')

@section('title', 'Recibo')

@section('content')
    <div class="container">

        @if (session('alert-msg'))
            @include('message')
        @endif
        @if ($errors->any())
            @include('errors-message')
        @endif

        <div class="row">
            <h1>Recibo #{{ $recibo->id }}</h1>
        </div>
        <hr>
        <div class="row mb-2">
            <div class="col-4 text-right">
                <h5>Cliente:</h5>
            </div>
            <div class="col-8 text-left">
                <h5>{{ $recibo->nome_cliente }}</h5>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-4 text-right">
                <h5>NIF:</h5>
            </div>
            <div class="col-8 text-left">
                <h5>{{ $recibo->cliente->nif ?? 'N/A' }}</h5>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-4 text-right">
                <h5>Data do Recibo:</h5>
            </div>
            <div class="col-8 text-left">
                <h5>{{ date('j F, Y', strtotime($recibo->data)) }}</h5>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-4 text-right">
                <h5>Tipo de Pagamento:</h5>
            </div>
            <div class="col-8 text-left">
                <h5>{{ $recibo->tipo_pagamento }}</h5>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-4 text-right">
                <h5>Referência de Pagamento:</h5>
            </div>
            <div class="col-8 text-left">
                <h5>{{ $recibo->ref_pagamento }}</h5>
            </div>
        </div>
        <div class="row pt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Bilhete</th>
                        <th>Filme</th>
                        <th>Sala</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th class="text-right">Estado</th>
                        <th class="text-right">Preço</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bilhetes as $bilhete)
                        <tr>
                            <td>{{ $bilhete->id }}</td>
                            <td>{{ $bilhete->sessao->filme->titulo }}</td>
                            <td>{{ $bilhete->sessao->sala->nome }}</td>
                            <td>{{ date('j F, Y', strtotime($bilhete->sessao->data)) }}</td>
                            <td>{{ date('H:i', strtotime($bilhete->sessao->data)) }}</td>
                            <td class="text-right">{{ $bilhete->isUsado() ? 'Usado' : 'Não Usado' }}</td>
                            <td class="text-right">{{ $bilhete->preco_sem_iva }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-3">
            <div class="col text-right">
                <h5>TOTAL SEM IVA: {{ $recibo->preco_total_sem_iva }} €</h5>
                <h5>IVA: {{ $recibo->iva }} €</h5>
                <h3>TOTAL (COM IVA): {{ $recibo->preco_total_com_iva }} €</h3>
            </div>
        </div>
    </div>
@endsection
