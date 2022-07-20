@extends('layout')

@section('title', 'Perfil')

@section('content')
    <div class="container w-50">
        <form method="post" action="{{ route('cliente.perfil.update') }}" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <label for="foto_url" class="col-md-4 col-form-label text-md-end">{{ __('Upload Photo') }}</label>

                <div class="col-md-6">
                    <input id="foto_url" type="file" class="form-control @error('foto_url') is-invalid @enderror"
                        name="foto_url">

                    @error('foto_url')
                        <span class="small text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
            </div>

            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end">{{ __('User Photo') }}</label>

                <div class="col-md-6 ">
                    <img src="{{ $cliente->user->foto_url ? asset('storage/fotos/' . $cliente->user->foto_url) : asset('img/default_img.png') }}"
                        alt="Foto do utilizador" class="w-25 img-fluid rounded">
                </div>

            </div>

            <div class="row py-1 align-items-center">
                <div class="col-sm-12">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend input-group-lg">
                            <span class="input-group-text" id="name">Nome</span>
                        </div>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            aria-required="false" id="name" placeholder="E-mail"
                            value="{{ old('name', $cliente->user->name) }}">
                    </div>
                    @error('name')
                        <span class="small text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row py-1 align-items-center">
                <div class="col-sm-12">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend input-group-lg">
                            <span class="input-group-text" id="email">@</span>
                        </div>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            aria-required="false" id="email" placeholder="E-mail"
                            value="{{ old('email', $cliente->user->email) }}">
                    </div>
                    @error('nif')
                        <span class="small text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row py-1 align-items-center">
                <div class="col-sm-12">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend input-group-lg">
                            <span class="input-group-text" id="nif">{{ __('NIF') }}</span>
                        </div>
                        <input type="text" class="form-control @error('nif') is-invalid @enderror" name="nif"
                            aria-required="false" id="nif" placeholder="NIF"
                            value="{{ old('nif', $cliente->nif) }}">

                        @error('nif')
                            <span class="small text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row py-1 align-items-center">
                <div class="col-sm-12">
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend input-group-lg">
                            <label class="input-group-text" for="paymentType">Pagamento</label>
                        </div>
                        <select class="form-control @error('tipo_pagamento') is-invalid @enderror" id="paymentType">
                            <option selected>{{ $cliente->tipo_pagamento }}</option>
                            @if (old('tipo_pagamento', $cliente->tipo_pagamento) == 'VISA')
                                <option value="1">PAYPAL</option>
                                <option value="2">MBWAY</option>
                            @elseif (old('tipo_pagamento', $cliente->tipo_pagamento) == 'PAYPAL')
                                <option value="1">VISA</option>
                                <option value="2">MBWAY</option>
                            @else
                                <option value="1">VISA</option>
                                <option value="2">PAYPAL</option>
                            @endif
                        </select>
                    </div>
                    @error('tipo_pagamento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @can('update', $cliente)
                <div class="row text-center align-items-center" style="padding-top: 3rem">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-success btn-lg" name="submit"
                            form="form_change_personal_info">{{ __('Aplicar') }}</button>
                    </div>
                </div>
            @endcan
        </form>
    </div>
@endsection
