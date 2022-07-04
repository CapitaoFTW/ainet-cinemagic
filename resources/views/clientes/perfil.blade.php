@extends('layout')

@section('title', 'Perfil')

@section('content')
    <div class="container w-50">
        <form method="POST" action="{{ route('clientes.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row text-center justify-content-center" style="padding-bottom: 3rem">
                @if ($cliente->user->foto_url != '')
                    <div class="row text-center justify-content-center" style="padding-bottom: 3rem">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-2">
                            <img src="{{ asset('public/fotos/' . $cliente->user->foto_url) }}" class="rounded-circle"
                                style="height: 10rem" alt="Cartaz">
                        </div>
                        <div class="col-md-4" style="padding-top: 3.5rem">
                            <button type="button" class="btn btn-primary btn-lg">{{ __('Mudar Foto') }}</button>
                        </div>
                    @else
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary btn-lg">{{ __('Descarregar Foto') }}</button>
                        </div>
                @endif
            </div>
            <div class="row py-1 align-items-center">
                <div class="col-sm-12">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend input-group-lg">
                            <span class="input-group-text" id="email">Nome</span>
                        </div>
                        <input type="text" class="form-control" aria-required="false" id="email" placeholder="E-mail"
                            value="{{ $cliente->user->name }}">
                    </div>
                </div>
            </div>
            <div class="row py-1 align-items-center">
                <div class="col-sm-12">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend input-group-lg">
                            <span class="input-group-text" id="email">@</span>
                        </div>
                        <input type="text" class="form-control" aria-required="false" id="email" placeholder="E-mail"
                            value="{{ $cliente->user->email }}">
                    </div>
                </div>
            </div>
            <div class="row py-1 align-items-center">
                <div class="col-sm-12">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend input-group-lg">
                            <span class="input-group-text" id="nif">{{ __('NIF') }}</span>
                        </div>
                        <input type="text" class="form-control" aria-required="false" id="nif" placeholder="NIF"
                            value="{{ $cliente->nif }}">
                    </div>
                </div>
            </div>
            <div class="row py-1 align-items-center">
                <div class="col-sm-12">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend input-group-lg">
                            <label class="input-group-text" for="inputGroupSelect01">Pagamento</label>
                        </div>
                        <select class="form-control" id="inputGroupSelect01">
                            <option selected>{{ $cliente->tipo_pagamento }}</option>
                            @if ($cliente->tipo_pagamento == 'VISA')
                                <option value="1">PAYPAL</option>
                                <option value="2">MBWAY</option>
                            @elseif ($cliente->tipo_pagamento == 'PAYPAL')
                                <option value="1">VISA</option>
                                <option value="2">MBWAY</option>
                            @else
                                <option value="1">VISA</option>
                                <option value="2">PAYPAL</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="row text-center align-items-center" style="padding-top: 3rem">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success btn-lg" name="submit"
                        form="form_change_personal_info">{{ __('Aplicar') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
